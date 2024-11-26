<?php

namespace App\Livewire\Setup\Unitkearsipan;

use App\Models\Berkas;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Unitkearsipan;
use Livewire\Attributes\Validate;
use Livewire\WithoutUrlPagination;

class Index extends Component
{
    use WithPagination, WithoutUrlPagination;
    public $perPage = 10;
    public $search = '';
    public $id_uk;

    #[Validate('required', message: 'Kode UK harus diisi')]
    public $kode_uk;

    #[Validate('required', message: 'Nama Unit harus diisi')]
    public $nama_unit;

    public function render()
    {
        $data_uk = Unitkearsipan::where('nama_unit', 'like', '%'.$this->search.'%')
                                ->paginate($this->perPage);

        return view('livewire.setup.unitkearsipan.index', [
            'data_uk' => $data_uk
        ]);
    }

    public function tambahUK()
    {
        $this->dispatch('open-modal', 'modal-tambah-uk');
    }

    public function formTambahUK()
    {
        $validated = $this->validate();

        //cek apakah kode uk duplikasi
        $cek = Unitkearsipan::where('kode_uk', $this->kode_uk)->first();
        if($cek){
            $this->dispatch('error', ['message' => 'Kode UK sudah ada.']);
            $this->closeModalTambahUK();
            return;
        }
        Unitkearsipan::create($validated);
        $this->dispatch('success',['message' => 'Data UK berhasil ditambahkan.']);
        $this->closeModalTambahUK();
    }

    public function editUK($id)
    {
        $data = Unitkearsipan::find($id);
        $this->id_uk = $data->id;
        $this->kode_uk = $data->kode_uk;
        $this->nama_unit = $data->nama_unit;
        $this->dispatch('open-modal', 'modal-edit-uk');
    }

    public function formEditUK()
    {
        $validated = $this->validate();

        //cek apakah kode uk duplikasi
        $cek = Unitkearsipan::where('kode_uk', $this->kode_uk)->where('id', '!=', $this->id_uk)->first();
        if($cek){
            $this->dispatch('error', ['message' => 'Kode UK sudah ada.']);
            $this->closeModalEditUK();
            return;
        }
        Unitkearsipan::find($this->id_uk)->update($validated);
        $this->dispatch('success',['message' => 'Data UK berhasil diubah.']);
        $this->closeModalEditUK();
    }

    public function hapusUK($id)
    {
        $data = Unitkearsipan::find($id);
        $this->id_uk = $data->id;
        $this->kode_uk = $data->kode_uk;
        $this->dispatch('open-modal', 'modal-hapus-uk');
    }

    public function formHapusUK()
    {
        //cek apakah ada data yg melekat pada UK
        $data = Berkas::where('kode_uk', $this->kode_uk)->first();
        if($data){
            $this->dispatch('error', ['message' => 'Gagal menghapus UK karena sudah ada data berkas.']);
            $this->closeModalHapusUK();
            return;
        }
        Unitkearsipan::find($this->id_uk)->delete();
        $this->dispatch('success',['message' => 'Data UK berhasil dihapus.']);
        $this->closeModalHapusUK();
    }

    public function closeModalTambahUK()
    {
        $this->reset();
        $this->dispatch('close-modal', 'modal-tambah-uk');
    }

    public function closeModalHapusUK()
    {
        $this->reset();
        $this->dispatch('close-modal', 'modal-hapus-uk');
    }

    public function closeModalEditUK()
    {
        $this->reset();
        $this->dispatch('close-modal', 'modal-edit-uk');
    }
}
