<?php

namespace App\Livewire\Isiberkas\Daftar;

use App\Models\Berkas;
use Livewire\Component;
use App\Models\Isiberkas;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\Attributes\Validate;
use Livewire\WithoutUrlPagination;

class Index extends Component
{
    use WithPagination, WithoutUrlPagination;
    public $enc_id_berkas;
    public $perPage = 10;
    public $search = '';
    public $id_arsip;
    public $id_berkas;
    public $no_berkas;
    public $uraian_berkas;
    public $klasifikasi;
    public $lokasi_rc;
    public $ruang;
    public $rak;
    public $boks;
    public $folder;

    //detail
    public $no_item;
    public $uraian_isi_berkas;
    public $tanggal;
    public $jumlah;
    public $perkembangan;
    public $media;
    public $bentuk;
    public $kondisi;

    //pemberkasan
    public $enc_id;

    //pindahkan arsip
    public $search_berkas = [];
    public $data_berkas;
    public $new_id_arsip;

    #[Validate('required', message: 'No. Berkas harus diisi.')]
    public $new_no_berkas;

    #[Validate('required')]
    public $new_id_berkas;
    public $new_uraian_berkas;
    public $new_tahun;
    public $new_unit_pengolah;
    public $new_kode_klas;
    public $new_fungsi;
    public $new_klasifikasi;
    public $new_jenis_arsip;
    public $new_folder;
    public $no_item_terakhir;


    public function mount($id)
    {
        $this->enc_id_berkas = $id;
        $berkas = Berkas::where('enc_id', $id)->first();
        if($berkas){
            $this->id_berkas = $berkas->id_berkas;
            $this->no_berkas = $berkas->no_berkas;
            $this->uraian_berkas = $berkas->uraian_berkas;
            $this->klasifikasi = $berkas->kode_klas.' - '.$berkas->fungsi;
            $this->lokasi_rc = $berkas->lokasi_rc;
            $this->ruang = $berkas->ruang;
            $this->rak = $berkas->rak;
            $this->boks = $berkas->boks;
            $this->folder = $berkas->folder;
        }else{
            return abort(404);
        }
    }

    #[On('refreshIsiBerkas')]
    public function render()
    {
        $data_arsip = Isiberkas::where('uraian_isi_berkas', 'like', '%'.$this->search.'%')
                                ->where('id_berkas', $this->id_berkas)
                                ->orderByDesc('no_item')
                                ->orderBy('created_at', 'desc')
                                ->paginate($this->perPage);

        return view('livewire.isiberkas.daftar.index',[
            'data_arsip' => $data_arsip
        ]);
    }

    public function details($id)
    {
        $data = Isiberkas::find($id);
        $this->no_item = $data->no_item;
        $this->uraian_isi_berkas = $data->uraian_isi_berkas;
        $this->tanggal = $data->tanggal;
        $this->jumlah = $data->jumlah;
        $this->perkembangan = $data->perkembangan;
        $this->bentuk = $data->bentuk;
        $this->media = $data->media;
        $this->kondisi = $data->kondisi;
        $this->dispatch('open-modal', 'modal-detail');
    }

    public function pindahkan($id)
    {
        $this->id_arsip = $id;
        $this->dispatch('open-modal', 'modal-pindahkan');
    }

    public function keluarkan($id)
    {
        $this->id_arsip = $id;
        $this->dispatch('open-modal', 'modal-keluarkan');
    }

    public function keluarkanArsip()
    {
        $updated = [
            'no_berkas' => null,
            'id_berkas' => null,
            'no_item' => null,
        ];
        Isiberkas::find($this->id_arsip)->update($updated);
        $this->dispatch('success', ['message' => 'Item/isi berkas berhasil dikeluarkan']);
        $this->dispatch('close-modal', 'modal-keluarkan');
        $this->dispatch('refreshIsiBerkas');
    }

    public function editIsiBerkas($id)
    {
        $enc_id_arsip = Isiberkas::find($id)->enc_id;
        $redirect_url = $this->enc_id_berkas;
        $this->redirect('/daftar-berkas/isi-berkas/edit/'.$enc_id_arsip.'/'.$redirect_url);
    }

    public function closeModalDetail()
    {
        $this->dispatch('close-modal', 'modal-detail');
    }

    public function kembali()
    {
        $this->redirect('/daftar-berkas');
    }

    //modul pindahkan arsip
    public function updatedNewNoBerkas()
    {
        $this->data_berkas = Berkas::where('kode_uk', auth()->user()->kode_uk)
                                    ->where(function($query) {
                                        $query->where('no_berkas', 'like', '%'.$this->new_no_berkas.'%')
                                            ->orWhere('uraian_berkas', 'like', '%'.$this->new_no_berkas.'%');
                                        })
                                    ->where('status_musnah' , '=', 0)
                                    ->get()
                                    ->take(10);

        $this->search_berkas = $this->data_berkas;
    }

    public function selectedBerkas($id)
    {
        $data = Berkas::find($id);
        $this->new_id_berkas = $data->id_berkas;
        $this->new_no_berkas = $data->no_berkas;
        $this->new_uraian_berkas = $data->uraian_berkas;
        $this->new_tahun = $data->tahun;
        $this->new_unit_pengolah = $data->unit->nama_unit ?? $data->unit_pengolah;
        $this->new_jenis_arsip = $data->jenis_arsip;
        $this->new_folder = $data->folder;
        $this->new_klasifikasi = $data->kode_klas.' - '.$data->fungsi;
        $this->search_berkas = [];
    }

    public function closeModalPindahkan()
    {
        $this->dispatch('close-modal', 'modal-pindahkan');
    }

    public function formPindahkan()
    {
        $validated = $this->validate();
        $cekBerkas = Isiberkas::where('id_berkas', $this->new_id_berkas)->first();
        if($cekBerkas) {
            $no_item_terakhir = $cekBerkas->no_item;
        }else{
            $no_item_terakhir = 0;
        }
        $validated['no_item'] = $no_item_terakhir + 1;

        //masukkan ke database
        Isiberkas::where('id', $this->id_arsip)->update([
            'no_berkas' => $validated['new_no_berkas'],
            'id_berkas' => $validated['new_id_berkas'],
            'no_item' => $validated['no_item'],
        ]);

        $this->dispatch('success', ['message' => 'Arsip berhasil dipindahkan ke berkas yang baru.']);
        $this->dispatch('refresh');
        $this->closeModalPindahkan();
    }

}
