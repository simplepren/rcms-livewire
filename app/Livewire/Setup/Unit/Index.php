<?php

namespace App\Livewire\Setup\Unit;

use App\Models\Unit;
use App\Models\Berkas;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Unitkearsipan;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Livewire\WithoutUrlPagination;

class Index extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $perPage = 10;
    public $search = '';

    public $id_unit;

    #[Validate('required', message: 'Kode UK harus diisi.')]
    public $kode_uk;

    #[Validate('required', message: 'Kode Unit harus diisi.')]
    public $kode_unit;

    #[Validate('required', message: 'Nama Unit harus diisi.')]
    public $nama_unit;

    #[Validate('required', message: 'Eselon I harus diisi.')]
    public $es1_akr = 'BPPK';

    #[Validate('required', message: 'Nama Eselon I harus diisi.')]
    public $es1 = 'Badan Pendidikan dan Pelatihan Keuangan';

    #[Computed()]
    public function getUnit()
    {
        if(auth()->user()->role == 'superadmin') {
            $data_unit = Unit::where(function($query) {
                $query->where('kode_unit', 'like', '%'.$this->search.'%')
                    ->orWhere('nama_unit', 'like', '%'.$this->search.'%');
                });
        }elseif(auth()->user()->role == 'admin') {
            $data_unit = Unit::where(function($query) {
                $query->where('kode_unit', 'like', '%'.$this->search.'%')
                    ->orWhere('nama_unit', 'like', '%'.$this->search.'%');
                })
                ->where('kode_uk', auth()->user()->kode_uk);
        }
        return $data_unit;
    }

    public function mount()
    {
        $this->kode_uk = auth()->user()->kode_uk;
        $jml_unit = Unit::where('kode_uk', auth()->user()->kode_uk)->count();
        $max_unit = $jml_unit + 1;
        $this->kode_unit = $this->kode_uk.'.'.$max_unit;
    }

    public function render()
    {
        $data_uk = Unitkearsipan::where('kode_uk', auth()->user()->kode_uk)->get();
        return view('livewire.setup.unit.index', [
            'data_unit' => $this->getUnit()->paginate($this->perPage),
            'data_uk' => $data_uk
        ]);
    }
    public function tambahUnit()
    {
        $this->dispatch('open-modal', 'modal-tambah-unit');
    }

    public function formTambahUnit()
    {
        $validated = $this->validate();

        //cek apakah kode unit duplikasi
        $cek = Unit::where('kode_uk', auth()->user()->kode_uk)->where('kode_unit', $this->kode_unit)->first();
        if($cek){
            $this->dispatch('error', ['message' => 'Kode Unit sudah ada.']);
            $this->closeModalTambahUnit();
            return;
        }
        Unit::create($validated);
        $this->dispatch('success',['message' => 'Data Unit berhasil ditambahkan.']);
        $this->closeModalTambahUnit();
    }

    public function editUnit($id)
    {
        $data = Unit::find($id);
        $this->id_unit = $data->id;
        $this->kode_unit = $data->kode_unit;
        $this->nama_unit = $data->nama_unit;
        $this->dispatch('open-modal', 'modal-edit-unit');
    }

    public function formEditUnit()
    {
        $validated = $this->validate();

        //cek apakah kode unit duplikasi
        $cek = Unit::where('kode_unit', $this->kode_unit)->where('id', '!=', $this->id_unit)->first();
        if($cek){
            $this->dispatch('error', ['message' => 'Kode Unit sudah ada.']);
            $this->closeModalEditUnit();
            return;
        }
        Unit::find($this->id_unit)->update($validated);
        $this->dispatch('success',['message' => 'Data Unit berhasil diubah.']);
        $this->closeModalEditUnit();
    }

    public function hapusUnit($id)
    {
        $data = Unit::find($id);
        $this->id_unit = $data->id;
        $this->kode_unit = $data->kode_unit;
        $this->dispatch('open-modal', 'modal-hapus-unit');
    }

    public function formHapusUnit()
    {
        //cek apakah ada data yg melekat pada Unit
        $data = Berkas::where('unit_pengolah', $this->kode_unit)->first();
        if($data){
            $this->dispatch('error', ['message' => 'Gagal menghapus Unit karena sudah ada data berkas.']);
            $this->closeModalHapusUnit();
            return;
        }
        Unit::find($this->id_unit)->delete();
        $this->dispatch('success',['message' => 'Data Unit berhasil dihapus.']);
        $this->closeModalHapusUnit();
    }

    public function closeModalTambahUnit()
    {
        $this->reset();
        $this->dispatch('close-modal', 'modal-tambah-unit');
    }

    public function closeModalHapusUnit()
    {
        $this->reset();
        $this->dispatch('close-modal', 'modal-hapus-unit');
    }

    public function closeModalEditUnit()
    {
        $this->reset();
        $this->dispatch('close-modal', 'modal-edit-unit');
    }
}
