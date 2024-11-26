<?php

namespace App\Livewire\Manajemenberkas\Pindahboks;

use App\Models\Berkas;
use Livewire\Component;
use App\Models\Rakarsip;
use App\Models\Ruangarsip;
use App\Models\Recordscenter;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;

class Index extends Component
{
    public $query;
    public $search;
    public $kode_boks;

    #[Validate('required', message: 'Kode boks harus diisi.')]
    public $lokasi_rc;

    #[Validate('required', message: 'Ruangan harus diisi.')]
    public $ruang;

    #[Validate('required', message: 'Rak harus diisi.')]
    public $rak;

    #[Validate('required', message: 'Boks harus diisi.')]
    public $boks;

    #[Computed()]
    public function data_boks()
    {
        $data = Berkas::where('kode_uk', auth()->user()->kode_uk)->where('kode_boks', $this->query)->first();
        $this->kode_boks = $data->kode_boks ?? '';
        return $data;
    }

    #[Computed()]
    public function ruangan()
    {
        return Ruangarsip::where('kode_uk', auth()->user()->kode_uk)->where('kode_rc', $this->lokasi_rc)->get();
    }

    #[Computed()]
    public function rakArsip()
    {
        return Rakarsip::where('kode_rc', $this->lokasi_rc)->where('kode_ruang', $this->ruang)->get();
    }

    public function render()
    {
        $data_rc = Recordscenter::where('kode_uk', auth()->user()->kode_uk)->get();
        return view('livewire.manajemenberkas.pindahboks.index', [
            'data_rc' => $data_rc
        ]);
    }

    public function cariBoks()
    {
        $this->query = $this->search;
        $this->search = '';
    }

    public function pindahBoks()
    {
        $this->dispatch('open-modal', 'modal-pindahkan');
    }

    public function formPindahkan()
    {
        $validated = $this->validate();

        //tentukan kode boks
        $boks_baru = $this->getKodeBoks($validated['lokasi_rc'], $validated['ruang'], $validated['rak'], $validated['boks']);
        $validated['kode_boks'] = $boks_baru;

        //cek ada berapa berkas pada boks lama
        $total_berkas = Berkas::where('kode_uk', auth()->user()->kode_uk)->where('kode_boks', $this->query)->get();

        //tentukan nomor folder
        // $cek_folder = Berkas::where('kode_uk', auth()->user()->kode_uk)->where('kode_boks', $boks_baru)->latest()->first();
        $cek_folder = Berkas::where('kode_uk', auth()->user()->kode_uk)->where('kode_boks', $boks_baru)->max('folder');

        foreach($total_berkas as $berkas) {
            $folder_baru = $cek_folder;
            $validated['folder'] = $folder_baru + 1;
            $folder_baru++;

            //masukkan ke database
            $berkas->update($validated);
        }
        $this->dispatch('success', ['message' => 'Data berkas berhasil dipindahkan.']);
        $this->closeModalPindahkan();
    }

    public function closeModalPindahkan()
    {
        $this->reset();
        $this->dispatch('close-modal', 'modal-pindahkan');
    }

    public function getKodeBoks($rc, $ruang, $rak, $boks)
    {
        return $rc.'-'.$ruang.'-'.$rak.'-'.$boks;
    }
}
