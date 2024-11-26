<?php

namespace App\Livewire\Manajemenberkas\Manuver\Berkas;

use App\Models\Berkas;
use Livewire\Component;
use App\Models\Rakarsip;
use App\Models\Ruangarsip;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use App\Models\Recordscenter;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Livewire\WithoutUrlPagination;

class Index extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $filter_kode_klas, $filter_tahun_awal, $filter_tahun_akhir;
    public $search = '';
    public $perPage = 10;

    public $id_berkas;

    public $ids = [];
    public $selectAll = false;
    public $selectedIds = [];

    #[Validate('required', message: 'Lokasi RC tidak boleh kosong.')]
    public $lokasi_rc;

    #[Validate('required', message: 'Ruangan tidak boleh kosong.')]
    public $ruang;

    #[Validate('required', message: 'Rak tidak boleh kosong.')]
    public $rak;

    #[Validate('required', message: 'Boks tidak boleh kosong.')]
    public $boks;

    #[Computed()]
    public function ruangan()
    {
        return Ruangarsip::where('kode_uk', auth()->user()->kode_uk)->where('kode_rc', $this->lokasi_rc)->get();
    }

    #[Computed()]
    public function rakArsip()
    {
        return Rakarsip::where('kode_uk', auth()->user()->kode_uk)->where('kode_rc', $this->lokasi_rc)->where('kode_ruang', $this->ruang)->get();
    }

    #[On('refresh')]
    public function render()
    {
        $kode_uk = auth()->user()->kode_uk;
        $data_berkas = Berkas::where('kode_uk', $kode_uk)
                                ->where('status_musnah', 0)
                                ->whereNull('kode_boks')
                                ->where(function($query) {
                                    $query->where('uraian_berkas', 'like', '%'.$this->search.'%')
                                    ->orWhere('no_berkas', 'like', '%'.$this->search.'%')
                                    ->orWhere('boks_awal', 'like', '%'.$this->search.'%')
                                    ->orWhere('kode_klas', 'like', '%'.$this->search.'%');
                                })
                                ->when($this->filter_kode_klas, function($query) {
                                    return $query->where('kode_klas', 'like', '%'.$this->filter_kode_klas.'%');
                                })
                                ->when($this->filter_tahun_awal, function($query) {
                                    return $query->where('tahun', '>=', $this->filter_tahun_awal);
                                })
                                ->when($this->filter_tahun_akhir, function($query) {
                                    return $query->where('tahun', '<=', $this->filter_tahun_akhir);
                                })
                                ->orderBy('no_berkas', 'desc')
                                ->paginate($this->perPage);
        $data_rc = Recordscenter::where('kode_uk', $kode_uk)->get();
        $this->ids = array_column($data_berkas->items(), 'id');

        return view('livewire.manajemenberkas.manuver.berkas.index',[
            'data_berkas' => $data_berkas,
            'data_rc' => $data_rc
        ]);
    }

    public function updatedSelectedIds($value)
    {
        if(count($this->ids) == count($this->selectedIds)) {
            $this->selectAll = true;
        }else{
            $this->selectAll = false;
        }
    }

    public function updatedSelectAll($value)
    {
        if($value){
            $this->selectedIds = $this->ids;
        }else{
            $this->selectedIds = [];
        }
    }

    public function updatedLokasiRc()
    {
        $this->ruang = '';
    }

    public function manuverBerkas()
    {
        $this->dispatch('open-modal', 'modal-manuver-berkas');
    }

    public function formManuverBerkas()
    {
        $validated = $this->validate();

        //buat kode boks
        $kode_boks = $this->getKodeBoks($this->lokasi_rc, $this->ruang, $this->rak, $this->boks);

        //masukkan ke database
        $max_folder = Berkas::where('kode_uk', auth()->user()->kode_uk)->where('kode_boks', $kode_boks)->max('folder');
        foreach($this->selectedIds as $id) {
            Berkas::where('id', $id)->update([
                'lokasi_rc' => $validated['lokasi_rc'],
                'ruang' => $validated['ruang'],
                'rak' => $validated['rak'],
                'boks' => $validated['boks'],
                'kode_boks' => $kode_boks,
                'folder' => $max_folder + 1
            ]);
            $max_folder++;
        }

        $this->dispatch('success', ['message' => 'Berkas berhasil dimanuver ke dalam boks.']);
        $this->dispatch('refresh');
        $this->closeModalManuver();
    }

    public function editBerkas($id)
    {
        $enc_id = Berkas::find($id)->enc_id;
        $link_asal = 'manuver-berkas';
        $this->redirect('/berkas/edit/'.$enc_id.'/'.$link_asal);
    }

    public function hapusBerkas($id)
    {
        $berkas = Berkas::find($id);
        $this->id_berkas = $berkas->id;
        $this->dispatch('open-modal', 'modal-hapus-berkas');
    }

    public function formHapusBerkas()
    {
        $berkas = Berkas::find($this->id_berkas);

        //cari data isi berkas
        $isi_berkas = $berkas->itemBerkas;
        if($isi_berkas){
            foreach ($isi_berkas as $item) {
                $item->delete();
            }
        }
        $berkas->delete();
        $this->dispatch('success', ['message' => 'Data berkas berhasil dihapus']);
        $this->dispatch('refresh');
        $this->closeModalHapus();
    }

    public function getKodeBoks($rc, $ruang, $rak, $boks)
    {
        return $rc.'-'.$ruang.'-'.$rak.'-'.$boks;
    }

    public function closeModalManuver()
    {
        $this->reset('selectedIds', 'ids', 'lokasi_rc', 'ruang', 'rak', 'boks');
        $this->dispatch('close-modal', 'modal-manuver-berkas');
    }

    public function closeModalHapus()
    {
        $this->reset('id_berkas');
        $this->dispatch('close-modal', 'modal-hapus-berkas');
    }

    public function resetFilter()
    {
        $this->reset('filter_kode_klas', 'filter_tahun_awal', 'filter_tahun_akhir');
    }
}
