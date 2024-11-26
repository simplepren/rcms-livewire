<?php

namespace App\Livewire\Setup\Klasifikasi;

use Livewire\Component;
use App\Models\Klasifikasi;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Livewire\WithoutUrlPagination;
use Illuminate\Support\Facades\Crypt;

class Index extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $perPage = 10;
    public $search = '';

    public $id_klasifikasi;
    public $kode_klas;
    public $fungsi;
    public $arsip;

    #[Validate('required', message: 'Retensi aktif harus diisi.')]
    public $aktif;

    #[Validate('required', message: 'Retensi inaktif harus diisi.')]
    public $inaktif;

    #[Validate('required', message: 'Keterangan harus diisi.')]
    public $keterangan;

    #[Computed()]
    public function getKlasifikasi()
    {
        $data_klas = Klasifikasi::where(function($query) {
                                $query->where('kode', 'like', '%'.$this->search.'%')
                                    ->orWhere('kode_clear', 'like', '%'.$this->search.'%')
                                    ->orWhere('fungsi', 'like', '%'.$this->search.'%')
                                    ->orWhere('arsip', 'like', '%'.$this->search.'%');
                                });
        return $data_klas;
    }

    public function render()
    {
        return view('livewire.setup.klasifikasi.index', [
            'data_klas' => $this->getKlasifikasi()->paginate($this->perPage)
        ]);
    }

    public function edit($id)
    {
        $enc_id = Crypt::encryptString($id);
        $this->redirect('/referensi/klasifikasi-arsip/edit/'.$enc_id);
    }

    public function editRetensi($id)
    {
        $this->id_klasifikasi = $id;
        $data_klas = Klasifikasi::find($id);
        $this->kode_klas = $data_klas->kode;
        $this->aktif = $data_klas->aktif;
        $this->inaktif = $data_klas->inaktif;
        $this->keterangan = $data_klas->keterangan;
        $this->dispatch('open-modal', 'modal-retensi');
    }

    public function formRetensi()
    {
        $validated = $this->validate();
        $data_klas = Klasifikasi::find($this->id_klasifikasi);
        $data_klas->update($validated);
        $this->dispatch('success', ['message' => 'Data retensi arsip berhasil diubah.']);
        $this->closeModalRetensi();
    }

    public function closeModalRetensi()
    {
        $this->dispatch('close-modal', 'modal-retensi');
        $this->reset();
    }

    public function hapus($id)
    {
        $this->id_klasifikasi = $id;
        $this->dispatch('open-modal', 'modal-hapus');
    }

    public function formHapusKlasifikasi()
    {
        $data_klas = Klasifikasi::find($this->id_klasifikasi);
        if(auth()->user()->role == 'admin' || auth()->user()->role == 'superadmin') {
            $data_klas->delete();
            $this->dispatch('success', ['message' => 'Data klasifikasi arsip berhasil dihapus.']);
            $this->closeModalHapus();
        } else {
            $this->dispatch('error', ['message' => 'Anda tidak memiliki hak untuk menghapus data klasifikasi arsip.']);
            $this->closeModalHapus();
        }
    }

    public function closeModalHapus()
    {
        $this->dispatch('close-modal', 'modal-hapus');
        $this->reset();
    }
}
