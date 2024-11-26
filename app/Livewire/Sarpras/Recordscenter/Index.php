<?php

namespace App\Livewire\Sarpras\Recordscenter;

use App\Models\Berkas;
use Livewire\Component;
use App\Models\Rakarsip;
use App\Models\Ruangarsip;
use Illuminate\Support\Str;
use App\Models\Recordscenter;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    use WithFileUploads;

    public $id_rc;
    public $old_foto = '';

    #[Validate('required', message: 'Kode RC wajib diisi.')]
    public $kode_rc;

    #[Validate('required', message: 'Nama RC wajib diisi.')]
    public $nama_rc;

    #[Validate('required', message: 'Alamat RC wajib diisi.')]
    public $alamat;

    #[Validate('nullable')]
    public $telp;

    #[Validate('nullable')]
    public $kepemilikan;

    #[Validate('nullable')]
    public $jml_lantai;

    #[Validate('nullable')]
    public $luas;

    #[Validate('nullable|image|max:2048', message: 'File harus berupa gambar.')]
    public $foto;

    public function render()
    {
        $data_rc = Recordscenter::where('kode_uk', auth()->user()->kode_uk)->get();
        return view('livewire.sarpras.recordscenter.index', compact('data_rc'));
    }

    public function tambah()
    {
        $this->dispatch('open-modal', 'modal-tambah-rc');
    }

    public function formTambah()
    {
        $validated = $this->validate();
        $validated['kode_uk'] = auth()->user()->kode_uk;

        //cek kode RC apakah duplikasi
        $cek = Recordscenter::where('kode_rc', $this->kode_rc)->where('kode_uk', auth()->user()->kode_uk)->first();
        if($cek){
            $this->dispatch('error', ['message' => 'Kode RC sudah ada, silakan ganti yang lain.']);
            $this->kode_rc = '';
            return;
        }

        if($this->foto){
            //naming file
            $random_str = Str::random(12);
            $new_file = $random_str . '.' . $this->foto->getClientOriginalExtension();
            $validated['foto'] = Storage::disk('real_public')->putFileAs('assets/images/rc', $this->foto, $new_file);
        }
        Recordscenter::create($validated);
        $this->dispatch('success',['message' => 'Data Records Center berhasil ditambahkan.']);
        $this->closeModal();
    }

    public function edit($id)
    {
        $data_rc = Recordscenter::find($id);
        $this->id_rc = $data_rc->id;
        $this->kode_rc = $data_rc->kode_rc;
        $this->nama_rc = $data_rc->nama_rc;
        $this->alamat = $data_rc->alamat;
        $this->telp = $data_rc->telp;
        $this->kepemilikan = $data_rc->kepemilikan;
        $this->jml_lantai = $data_rc->jml_lantai;
        $this->luas = $data_rc->luas;
        $this->old_foto = $data_rc->foto;
        $this->dispatch('open-modal', 'modal-edit-rc');
    }

    public function hapus($id)
    {
        $data_rc = Recordscenter::find($id);
        $this->id_rc = $data_rc->id;
        $this->kode_rc = $data_rc->kode_rc;
        $this->dispatch('open-modal', 'modal-hapus-rc');
    }

    public function formHapusRC()
    {
        //cek berkas apakah data RC sudah digunakan? klo ada, tidak bisa dihapus
        $cek_berkas = Berkas::where('lokasi_rc', $this->kode_rc)->where('kode_uk', auth()->user()->kode_uk)->first();
        if($cek_berkas){
            $this->dispatch('error', ['message' => 'Data Records Center tidak dapat dihapus, karena sudah menyimpan berkas.']);
            $this->closeModalHapusRC();
            return;
        }
        Recordscenter::where('id', $this->id_rc)->delete();
        Ruangarsip::where('kode_rc', $this->kode_rc)->delete();
        Rakarsip::where('kode_rc', $this->kode_rc)->delete();
        $this->dispatch('success',['message' => 'Data Records Center berhasil dihapus.']);
        $this->dispatch('refresh-rc');
        $this->dispatch('refresh-ruangan');
        $this->closeModalHapusRC();
    }

    public function formEditRC()
    {
        $validated = $this->validate();
        if($this->foto){
            //naming file
            $random_str = Str::random(12);
            $new_file = $random_str . '.' . $this->foto->getClientOriginalExtension();
            $validated['foto'] = Storage::disk('real_public')->putFileAs('assets/images/rc', $this->foto, $new_file);
        }else{
            unset($validated['foto']);
        }

        //edit data RC
        Recordscenter::where('id', $this->id_rc)->update($validated);
        $this->dispatch('success',['message' => 'Data Records Center berhasil diedit.']);
        $this->closeModalEditRC();
    }

    public function closeModal()
    {
        $this->reset();
        $this->dispatch('close-modal', 'modal-tambah-rc');
    }

    public function closeModalEditRC()
    {
        $this->reset();
        $this->dispatch('close-modal', 'modal-edit-rc');
    }

    public function closeModalHapusRC()
    {
        $this->reset();
        $this->dispatch('close-modal', 'modal-hapus-rc');
    }
}
