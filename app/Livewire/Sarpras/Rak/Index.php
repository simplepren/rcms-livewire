<?php

namespace App\Livewire\Sarpras\Rak;

use App\Models\Berkas;
use Livewire\Component;
use App\Models\Rakarsip;
use App\Models\Ruangarsip;
use Livewire\Attributes\On;
use App\Models\Recordscenter;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;

class Index extends Component
{
    public $perPage = 10;
    public $search = '';
    public $id_rak;

    #[Validate('required', message: 'Kode RC harus diisi.')]
    public $kode_rc;

    #[Validate('required', message: 'Kode ruangan harus diisi.')]
    public $kode_ruang;

    #[Validate('nullable')]
    public $nama_rak;

    #[Computed()]
    public function ruang()
    {
        return Ruangarsip::where('kode_uk', auth()->user()->kode_uk)->where('kode_rc', $this->kode_rc)->get();
    }

    #[On('refresh-ruangan')]
    public function render()
    {
        $rak = Rakarsip::where('kode_uk', auth()->user()->kode_uk)
                        ->where(function($query){
                            return $query->where('kode_ruang', 'like', '%'.$this->search.'%')
                            ->orWhere('nama_rak', 'like', '%'.$this->search.'%');
                        })
                        ->orderBy('kode_rc', 'desc')
                        ->orderBy('created_at', 'desc')
                        ->paginate($this->perPage);
        $rc = Recordscenter::where('kode_uk', auth()->user()->kode_uk)->get();

        return view('livewire.sarpras.rak.index', [
            'data_rak' => $rak,
            'data_rc' => $rc
        ]);
    }

    public function tambah()
    {
        $this->dispatch('open-modal', 'modal-tambah-rak');
    }

    public function updatedKodeRC()
    {
        $this->reset('kode_ruang');
    }

    public function formTambahRak()
    {
        $validated = $this->validate();
        $kode_uk = auth()->user()->kode_uk;
        $validated['kode_uk'] = $kode_uk;
        Rakarsip::create($validated);
        $this->dispatch('success',['message' => 'Data rak berhasil ditambahkan.']);
        $this->closeModalRak();
    }

    public function formEditRak()
    {
        $validated = $this->validate();
        Rakarsip::where('id', $this->id_rak)->update($validated);
        $this->dispatch('success',['message' => 'Data rak berhasil diubah.']);
        $this->closeModalEditRak();
    }

    public function editRak($id)
    {
        $data_rak = Rakarsip::find($id);
        $this->id_rak = $data_rak->id;
        $this->kode_rc = $data_rak->kode_rc;
        $this->kode_ruang = $data_rak->kode_ruang;
        $this->nama_rak = $data_rak->nama_rak;
        $this->dispatch('open-modal', 'modal-edit-rak');
    }

    public function hapusRak($id)
    {
        $data_rak = Rakarsip::find($id);
        $this->id_rak = $data_rak->id;
        $this->dispatch('open-modal', 'modal-hapus-rak');
    }

    public function formHapusRak()
    {
        $data_rak = Rakarsip::find($this->id_rak);

        //cek berkas pada rak
        $cek_rak = Berkas::where('kode_uk', auth()->user()->kode_uk)->where('lokasi_rc', $data_rak->kode_rc)->where('ruang', $data_rak->kode_ruang)->where('rak', $data_rak->nama_rak)->count();
        if($cek_rak > 0){
            $this->dispatch('error', ['message' => 'Rak gagal dihapus karena terdapat berkas pada rak.']);
            $this->closeModalHapusRak();
            return;
        }

        //apabila tidak ada berkas
        $data_rak->delete();
        $this->dispatch('success', ['message' => 'Data rak berhasil dihapus.']);
        $this->dispatch('refresh');
        $this->closeModalHapusRak();
    }

    public function closeModalRak()
    {
        $this->reset();
        $this->dispatch('close-modal', 'modal-tambah-rak');
    }

    public function closeModalEditRak()
    {
        $this->reset();
        $this->dispatch('close-modal', 'modal-edit-rak');
    }

    public function closeModalHapusRak()
    {
        $this->reset();
        $this->dispatch('close-modal', 'modal-hapus-rak');
    }
}
