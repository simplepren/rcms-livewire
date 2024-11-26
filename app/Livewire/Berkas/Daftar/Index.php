<?php

namespace App\Livewire\Berkas\Daftar;

use App\Models\Unit;
use App\Models\Berkas;
use Livewire\Component;
use App\Models\Rakarsip;
use App\Models\Ruangarsip;
use App\Exports\DataExport;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BerkasExport;
use App\Models\Recordscenter;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\DB;
use Livewire\WithoutUrlPagination;

class Index extends Component
{
    use WithPagination, WithoutUrlPagination;
    public $perPage = 10;
    public $search = '';

    //filter data
    public $filter_unit_pengolah;
    public $filter_kode_klas;
    public $filter_tahun_awal;
    public $filter_tahun_akhir;
    public $filter_lokasi_rc;
    public $filter_ruang;
    public $filter_rak;
    public $filter_retensi;

    //data utk detail berkas
    public $id_berkas;
    public $no_berkas;
    public $uraian_berkas;
    public $unit_pengolah;
    public $kurun_waktu;
    public $jenis_arsip;
    public $lokasi_rc;
    public $klasifikasi;
    public $ruang;
    public $rak;
    public $boks;
    public $folder;
    public $aktif;
    public $inaktif;
    public $ket_musnah;
    public $akses;
    public $keamanan;

    // #[Computed()]
    // public function koklas()
    // {
    //     return Berkas::where('kode_uk', auth()->user()->kode_uk)->where('status_musnah', 0)->pluck('kode_klas')->unique();
    // }

    #[Computed()]
    public function ruangan()
    {
        return Ruangarsip::where('kode_uk', auth()->user()->kode_uk)->where('kode_rc', $this->filter_lokasi_rc)->get();
    }

    #[Computed()]
    public function rakArsip()
    {
        return Rakarsip::where('kode_rc', $this->filter_lokasi_rc)->where('kode_ruang', $this->filter_ruang)->get();
    }

    #[Computed()]
    public function getDataBerkas()
    {
        $data = Berkas::where('kode_uk', auth()->user()->kode_uk)
                        ->where('status_musnah', 0)
                        ->where(function($query){
                            return $query->where('uraian_berkas', 'like', '%'.$this->search.'%')
                            ->orWhere('no_berkas', 'like', '%'.$this->search.'%')
                            ->orWhere('kode_boks', 'like', '%'.$this->search.'%')
                            ->orWhere('kode_klas', 'like', '%'.$this->search.'%');
                        })
                        ->when($this->filter_unit_pengolah, function($query) {
                            return $query->where('unit_pengolah', 'like', '%'.$this->filter_unit_pengolah.'%');
                        })
                        // ->when($this->filter_kode_klas, function($query) {
                        //     return $query->where('kode_klas', 'like', '%'.$this->filter_kode_klas.'%');
                        // })
                        ->when($this->filter_lokasi_rc, function($query) {
                            return $query->where('lokasi_rc', $this->filter_lokasi_rc);
                        })
                        ->when($this->filter_ruang, function($query) {
                            return $query->where('ruang', $this->filter_ruang);
                        })
                        ->when($this->filter_rak, function($query) {
                            return $query->where('rak', $this->filter_rak);
                        })
                        ->when($this->filter_tahun_awal, function($query) {
                            return $query->where('tahun', '>=', $this->filter_tahun_awal);
                        })
                        ->when($this->filter_tahun_akhir, function($query) {
                            return $query->where('tahun', '<=', $this->filter_tahun_akhir);
                        })
                        ->when($this->filter_retensi,function($query) {
                            switch ($this->filter_retensi) {
                                case 'Inaktif':
                                    return $query->where(DB::raw('tahun + aktif + inaktif'), '>=', date('Y'));
                                case 'Usul Musnah':
                                    return $query->where(DB::raw('tahun + aktif + inaktif'), '<', date('Y'));
                            }
                        })
                        ->orderBy('no_berkas', 'desc');

        return $data;
    }

    #[On('refresh')]
    public function render()
    {
        $data_berkas = $this->getDataBerkas()
                            ->paginate($this->perPage);

        $data_rc = Recordscenter::where('kode_uk', auth()->user()->kode_uk)->get();

        //data unit pengolah
        $data_unit = Unit::where('kode_unit', 'like', auth()->user()->kode_uk.'%')->get();

        return view('livewire.berkas.daftar.index',[
            'data_berkas' => $data_berkas,
            'data_rc' => $data_rc,
            'data_unit' => $data_unit
        ]);
    }

    public function details($id)
    {
        $data = Berkas::find($id);
        $this->uraian_berkas = $data->uraian_berkas;
        $this->no_berkas = $data->no_berkas;
        $this->uraian_berkas = $data->uraian_berkas;
        $this->unit_pengolah = $data->unit->nama_unit ?? $data->unit_pengolah;
        $this->kurun_waktu = $data->tahun;
        $this->jenis_arsip = $data->jenis_arsip;
        $this->klasifikasi = $data->kode_klas.' - '.$data->fungsi;
        $this->lokasi_rc = $data->lokasi_rc;
        $this->ruang = $data->ruang;
        $this->rak = $data->rak;
        $this->boks = $data->boks;
        $this->folder = $data->folder;
        $this->aktif = $data->aktif;
        $this->inaktif = $data->inaktif;
        $this->ket_musnah = $data->ket_musnah;
        $this->keamanan = $data->keamanan;
        $this->akses = $data->akses;
        $this->dispatch('open-modal', 'modal-detail');
    }

    public function closeModal()
    {
        $this->dispatch('close-modal', 'modal-detail');
        // $this->reset();
    }

    public function editBerkas($id)
    {
        $enc_id = Berkas::find($id)->enc_id;
        $link_asal = 'daftar-berkas';
        $this->redirect('/berkas/edit/'.$enc_id.'/'.$link_asal);
    }

    public function hapusBerkas($id)
    {
        $data_berkas = Berkas::find($id);
        $this->id_berkas = $data_berkas->id;
        $this->dispatch('open-modal', 'modal-hapus');
    }

    public function hapus($id)
    {
        $data_berkas = Berkas::find($id);

        //cari data isi berkas
        $isi_berkas = $data_berkas->itemBerkas;
        if($isi_berkas){
            foreach ($isi_berkas as $item) {
                $item->delete();
            }
        }
        $data_berkas->delete();

        $this->dispatch('success', ['message' => 'Data berkas berhasil dihapus']);
        $this->dispatch('refresh');
        $this->dispatch('close-modal', 'modal-hapus');
        $this->reset();
    }

    public function closeModalHapus()
    {
        $this->dispatch('close-modal', 'modal-hapus');
        $this->reset('id_berkas');
    }

    public function isiBerkas($id)
    {
        $enc_id = Berkas::find($id)->enc_id;
        $this->redirect('/daftar-berkas/isi-berkas/'.$enc_id);
    }

    public function resetFilter()
    {
        $this->reset('filter_unit_pengolah');
        $this->reset('filter_kode_klas');
        $this->reset('filter_lokasi_rc');
        $this->reset('filter_tahun_awal');
        $this->reset('filter_tahun_akhir');
        $this->reset('filter_retensi');
    }

    public function downloadFile()
    {
        $data = new DataExport($this->getDataBerkas()->get());
        return Excel::download($data, 'berkas.xlsx');
    }
}
