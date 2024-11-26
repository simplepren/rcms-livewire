<?php

namespace App\Livewire\Komponen\Dropdown;

use App\Models\Berkas;
use Livewire\Component;
use App\Models\Isiberkas;
use App\Models\Klasifikasi;

class Index extends Component
{
    public $no_berkas;
    public $data_klasifikasi;
    public $data_berkas;
    public $search_berkas = [];

    public $uraian_berkas;

    public function render()
    {
        return view('livewire.komponen.dropdown.index');
    }

    public function updatedNoBerkas()
    {
        $this->data_berkas = Berkas::where(function($query) {
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

        $this->dispatch('selected-berkas', no_berkas: $this->no_berkas, uraian_berkas: $this->uraian_berkas);

        //menentukan nomor item apabila memilih berkas
        $cekBerkas = Isiberkas::where('no_berkas', $this->no_berkas)->first();
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
}
