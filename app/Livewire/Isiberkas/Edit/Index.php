<?php

namespace App\Livewire\Isiberkas\Edit;

use App\Models\Berkas;
use Livewire\Component;
use App\Models\Isiberkas;
use App\Models\Klasifikasi;
use Livewire\Attributes\Validate;

class Index extends Component
{
    public $enc_id_arsip;
    public $enc_id_berkas;
    public $id_berkas;
    public $no_berkas;
    public $uraian_berkas;
    public $search_klas = [];
    public $klasifikasi;

    #[Validate('nullable')]
    public $no_item;

    #[Validate('nullable')]
    public $no_registrasi;

    #[Validate('required', message: 'Tanggal harus diisi.')]
    public $tanggal;

    #[Validate('required', message: 'Uraian informasi arsip harus diisi.')]
    public $uraian_isi_berkas;

    #[Validate('required', message: 'Kode klasifikasi arsip harus diisi.')]
    public $kode_klas;

    #[Validate('required', message: 'Kode klasifikasi arsip harus diisi.')]
    public $fungsi;

    #[Validate('required', message: 'Kondisi arsip harus diisi.')]
    public $kondisi;

    #[Validate('required', message: 'Media simpan arsip harus diisi.')]
    public $media;

    #[Validate('required', message: 'Media simpan arsip harus diisi.')]
    public $bentuk;

    #[Validate('required', message: 'Tingkat perkembangan harus diisi.')]
    public $perkembangan;

    #[Validate('required', message: 'Jumlah arsip harus diisi.')]
    #[Validate('numeric', message: 'Jumlah arsip harus berupa angka.')]
    public $jumlah;

    #[Validate('nullable')]
    public $folder_smt;

    public function mount($id_arsip, $id_berkas = null)
    {
        $this->enc_id_berkas = $id_berkas;
        $this->enc_id_arsip = $id_arsip;
        $data_arsip = Isiberkas::where('enc_id', $this->enc_id_arsip)->first();
        $data_berkas = Berkas::where('enc_id', $this->enc_id_berkas)->first();
        if(!$data_arsip){
            return abort(404);
        }
        $this->id_berkas = $data_arsip->id_berkas;
        $this->no_berkas = $data_arsip->no_berkas;
        $this->uraian_berkas = $data_berkas->uraian_berkas ?? '';
        $this->no_item = $data_arsip->no_item;
        $this->no_registrasi = $data_arsip->no_registrasi;
        $this->tanggal = $data_arsip->tanggal;
        $this->uraian_isi_berkas = $data_arsip->uraian_isi_berkas;
        $this->kode_klas = $data_arsip->kode_klas;
        $this->fungsi = $data_arsip->fungsi;
        $this->kondisi = $data_arsip->kondisi;
        $this->bentuk = $data_arsip->bentuk;
        $this->media = $data_arsip->media;
        $this->perkembangan = $data_arsip->perkembangan;
        $this->jumlah = $data_arsip->jumlah;
        $this->folder_smt = $data_arsip->folder_smt;
    }

    public function render()
    {
        return view('livewire.isiberkas.edit.index');
    }

    public function updatedKodeKlas()
    {
        $this->klasifikasi = Klasifikasi::where(function($query) {
                                        $query->where('kode', 'like', '%'.$this->kode_klas.'%')
                                            ->orWhere('kode_clear', 'like', '%'.$this->kode_klas.'%')
                                            ->orWhere('fungsi', 'like', '%'.$this->kode_klas.'%');
                                        })
                                        ->whereNotNull('aktif') //biar ada data retensi nya
                                        ->get()->take(10);

        $this->search_klas = $this->klasifikasi;
    }

    public function selectedKoklas($id)
    {
        $data = Klasifikasi::find($id);
        $this->kode_klas = $data->kode;
        $this->fungsi = $data->fungsi;
        $this->search_klas = [];
    }

    public function formEditArsip(){
        $validated = $this->validate();
        Isiberkas::where('enc_id', $this->enc_id_arsip)->update($validated);
        $this->dispatch('success', ['message' => 'Data arsip berhasil diubah.']);
        $this->kembali();
    }

    public function kembali()
    {
        if($this->enc_id_berkas){
            return redirect('/daftar-berkas/isi-berkas/'.$this->enc_id_berkas);
        }else{
            return redirect('/manajemen-berkas/manuver-isi-berkas');
        }
    }
}
