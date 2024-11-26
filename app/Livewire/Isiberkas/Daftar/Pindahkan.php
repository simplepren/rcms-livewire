<?php

namespace App\Livewire\Isiberkas\Daftar;

use App\Models\Berkas;
use Livewire\Component;
use App\Models\Isiberkas;
use Livewire\Attributes\Validate;

class Pindahkan extends Component
{
    public $data_berkas;
    public $search_berkas = [];
    public $id_arsip;

    #[Validate('required', message: 'No. Berkas harus diisi.')]
    public $no_berkas;

    #[Validate('required')]
    public $id_berkas;
    public $uraian_berkas;
    public $unit_pengolah;
    public $kode_klas;
    public $fungsi;
    public $klasifikasi;
    public $jenis_arsip;
    public $no_item;
    public $no_item_terakhir;

    public function mount($id)
    {
        $this->id_arsip = $id;
    }

    public function render()
    {
        return view('livewire.isiberkas.daftar.pindahkan');
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
        $this->tahun = $data->tahun;
        $this->unit_pengolah = $data->unit_pengolah;
        $this->jenis_arsip = $data->jenis_arsip;
        $this->folder = $data->folder;
        $this->klasifikasi = $data->kode_klas.' - '.$data->fungsi;
        $this->search_berkas = [];
    }

    public function formPindahkan()
    {
        $validated = $this->validate();
        $cekBerkas = Isiberkas::where('id_berkas', $this->id_berkas)->first();
        if($cekBerkas) {
            $no_item_terakhir = $cekBerkas->no_item;
        }else{
            $no_item_terakhir = 0;
        }

        $validated['no_item'] = $no_item_terakhir + 1;

        //masukkan ke database
        Isiberkas::where('id', $this->id_arsip)->update($validated);

        $this->dispatch('success', ['message' => 'Arsip berhasil diberkaskan']);
        $this->dispatch('refresh');
        $this->closeModalBerkaskan();
        $this->reset();
    }

    public function closeModalPindahkan()
    {
        $this->dispatch('close-modal', 'modal-pindahkan');
    }
}
