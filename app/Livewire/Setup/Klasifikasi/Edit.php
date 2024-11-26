<?php

namespace App\Livewire\Setup\Klasifikasi;

use Livewire\Component;
use App\Models\Klasifikasi;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class Edit extends Component
{
    public $id_klasifikasi;

    #[Validate('required', message: 'Kode klasifikasi harus diisi.')]
    public $kode;

    #[Validate('required', message: 'Fungsi harus diisi.')]
    public $fungsi;

    #[Validate('required', message: 'Deskripsi harus diisi.')]
    public $deskripsi;

    #[Validate('required', message: 'Contoh arsip harus diisi.')]
    public $arsip;

    #[Validate('required', message: 'Klasifikasi keamanan harus diisi.')]
    public $keamanan;

    #[Validate('required', message: 'Hak akses harus diisi.')]
    public $akses;

    #[Validate('required', message: 'Retensi aktif harus diisi.')]
    public $aktif;

    #[Validate('required', message: 'Retensi inaktif harus diisi.')]
    public $inaktif;

    #[Validate('required', message: 'Keterangan harus diisi.')]
    public $keterangan;

    public function mount($id)
    {
        try {
            $this->id_klasifikasi = Crypt::decryptString($id);
        } catch (DecryptException $e) {
            abort(404);
        }
        $data_klas = Klasifikasi::find($this->id_klasifikasi);
        $this->kode = $data_klas->kode;
        $this->fungsi = $data_klas->fungsi;
        $this->deskripsi = $data_klas->deskripsi;
        $this->arsip = $data_klas->arsip;
        $this->keamanan = $data_klas->keamanan;
        $this->akses = $data_klas->akses;
        $this->aktif = $data_klas->aktif;
        $this->inaktif = $data_klas->inaktif;
        $this->keterangan = $data_klas->keterangan;
    }

    public function render()
    {
        return view('livewire.setup.klasifikasi.edit');
    }

    public function formEdit()
    {
        $validated = $this->validate();
        $data_klas = Klasifikasi::find($this->id_klasifikasi);
        $data_klas->update($validated);
        $this->dispatch('success', ['message' => 'Data klasifikasi arsip berhasil diubah.']);
        return redirect()->route('klasifikasi');
    }

    public function kembali()
    {
        return redirect()->route('klasifikasi');
    }
}
