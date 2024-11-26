<?php

namespace App\Livewire\Isiberkas\Input;

use App\Models\Berkas;
use Livewire\Component;
use App\Models\Isiberkas;
use App\Models\Klasifikasi;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;

class Form extends Component
{
    #[Validate('nullable')]
    public $id_berkas;

    #[Validate('nullable')]
    public $no_berkas;

    #[Validate('nullable')]
    public $uraian_berkas;

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

    #[Validate('required', message: 'Bentuk arsip harus diisi.')]
    public $bentuk;

    #[Validate('required', message: 'Tingkat perkembangan harus diisi.')]
    public $perkembangan;

    #[Validate('required', message: 'Jumlah arsip harus diisi.')]
    #[Validate('numeric', message: 'Jumlah arsip harus berupa angka.')]
    public $jumlah;

    #[Validate('nullable')]
    public $folder_smt;

    public $data_klasifikasi;
    public $search_klas = [];
    public $data_berkas;
    public $search_berkas = [];

    public function render()
    {
        $this->perkembangan = 'asli';
        $this->kondisi = 'baik';
        $this->media = 'kertas';
        $this->bentuk = 'tekstual';

        return view('livewire.isiberkas.input.form');
    }

    public function formInput()
    {
        $validated = $this->validate();

        //menambahkan encrypted id
        $validated['enc_id'] = Str::uuid();
        $validated['kode_uk'] = auth()->user()->kode_uk;

        //cek folder sementara, apabila belum ditentukan berkasnya, harus diisi
        if($validated['no_berkas'] == null) {
            if($validated['folder_smt'] == null) {
                $this->dispatch('error', ['message' => 'Folder sementara harus diisi selama belum menentukan rumah berkas.']);
                return;
            }
        }

        //pastikan kembali no item agar tidak ada duplikasi nomor item berkas
        $cek_item = Isiberkas::where('id_berkas', $this->id_berkas)->where('no_berkas', $this->no_berkas)->latest()->first();
        if($cek_item) {
            $validated['no_item'] = $cek_item->no_item + 1;
        }else{
            $validated['no_item'] = 1;
        }

        //masukkan ke database
        Isiberkas::create($validated);
        $this->dispatch('success',['message' => 'Data isi berkas berhasil ditambahkan.']);
        $this->resetForm();
    }

    public function updatedNoBerkas()
    {
        $this->data_berkas = Berkas::where('kode_uk', auth()->user()->kode_uk)
                                    ->where(function($query) {
                                        $query->where('no_berkas', 'like', '%'.$this->no_berkas.'%')
                                            ->orWhere('uraian_berkas', 'like', '%'.$this->no_berkas.'%');
                                    })
                                    ->where('status_musnah' , '=', 0)
                                    ->get()
                                    ->take(10);

        $this->search_berkas = $this->data_berkas;
    }

    public function selectedBerkas($id)
    {
        $data = Berkas::find($id);
        $this->id_berkas = $data->id_berkas;
        $this->no_berkas = $data->no_berkas;
        $this->uraian_berkas = $data->uraian_berkas;
        $this->search_berkas = [];

        //menentukan nomor item apabila memilih berkas
        $cekBerkas = Isiberkas::where('id_berkas', $data->id_berkas)->where('no_berkas', $this->no_berkas)->latest()->first();

        if($cekBerkas) {
            $this->no_item = $cekBerkas->no_item + 1;
        }else{
            $this->no_item = 1;
        }

        //mengisi kode klasifikasi dari rumah berkas
        $data_klasifikasi = Klasifikasi::where('kode', $data->kode_klas)->first();
        if($data_klasifikasi) {
            $this->kode_klas = $data_klasifikasi->kode;
            $this->fungsi = $data_klasifikasi->fungsi;
        }
    }

    public function resetForm()
    {
        $this->reset();
    }

    public function updatedKodeKlas()
    {
        $this->data_klasifikasi = Klasifikasi::where(function($query) {
                                        $query->where('kode', 'like', '%'.$this->kode_klas.'%')
                                            ->orWhere('kode_clear', 'like', '%'.$this->kode_klas.'%')
                                            ->orWhere('fungsi', 'like', '%'.$this->kode_klas.'%');
                                        })
                                        ->whereNotNull('aktif') //biar ada data retensi nya
                                        ->get()->take(10);

        $this->search_klas = $this->data_klasifikasi;
    }

    public function selectedKoklas($id)
    {
        $data = Klasifikasi::find($id);
        $this->kode_klas = $data->kode;
        $this->fungsi = $data->fungsi;
        $this->search_klas = [];
    }
}
