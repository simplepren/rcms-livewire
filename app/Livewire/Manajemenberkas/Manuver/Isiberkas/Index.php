<?php

namespace App\Livewire\Manajemenberkas\Manuver\Isiberkas;

use App\Models\Berkas;
use Livewire\Component;
use App\Models\Isiberkas;
use App\Models\Klasifikasi;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class Index extends Component
{
    use WithPagination, WithoutUrlPagination;
    public $perPage = 10;
    public $search = '';
    public $ids = [];
    public $selectAll = false;
    public $selectedIds = [];
    public $id_arsip;

    public $id_berkas;
    public $no_berkas;
    public $uraian_berkas;
    public $tahun;
    public $unit_pengolah;
    public $kode_klas;
    public $fungsi;
    public $klasifikasi;
    public $jenis_arsip;
    public $folder;
    public $no_item;
    public $no_item_terakhir;

    public $data_berkas;
    public $search_berkas = [];

    #[On('refresh')]
    public function render()
    {
        $data_arsip = Isiberkas::where('kode_uk', auth()->user()->kode_uk)
                                ->where(function($query) {
                                    $query->where('uraian_isi_berkas', 'like', '%'.$this->search.'%')
                                    ->orWhere('no_registrasi', 'like', '%'.$this->search.'%')
                                    ->orWhere('kode_klas', 'like', '%'.$this->search.'%')
                                    ->orWhere('folder_smt', 'like', '%'.$this->search.'%');
                                })
                                ->whereNull('id_berkas')
                                ->orderBy('kode_klas')
                                ->orderBy('folder_smt')
                                ->orderBy('created_at', 'desc')
                                ->paginate($this->perPage);

        $this->ids = array_column($data_arsip->items(), 'id');

        return view('livewire.manajemenberkas.manuver.isiberkas.index',[
            'data_arsip' => $data_arsip
        ]);
    }

    public function updatedSelectedIds($value)
    {
        if(count($this->ids) == count($this->selectedIds)) {
            $this->selectAll = true;
        }else{
            $this->selectAll = false;
        }
    }

    public function updatedSelectAll($value)
    {
        if($value){
            $this->selectedIds = $this->ids;
        }else{
            $this->selectedIds = [];
        }
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
        $this->unit_pengolah = $data->unit->nama_unit ?? $data->unit_pengolah;
        $this->jenis_arsip = $data->jenis_arsip;
        $this->folder = $data->folder;
        $this->search_berkas = [];

        //mengisi kode klasifikasi dari rumah berkas
        $data_klasifikasi = Klasifikasi::where('kode', $data->kode_klas)->first();
        if($data_klasifikasi) {
            $this->kode_klas = $data_klasifikasi->kode;
            $this->fungsi = $data_klasifikasi->fungsi;
            $this->klasifikasi = $this->kode_klas.' - '.$this->fungsi;
        }
    }

    public function berkaskan()
    {
        $this->dispatch('open-modal', 'modal-berkaskan');
    }

    public function formBerkaskan()
    {
        $cekBerkas = Isiberkas::where('id_berkas', $this->id_berkas)->first();
        if($cekBerkas) {
            $this->no_item_terakhir = $cekBerkas->no_item;
        }else{
            $this->no_item_terakhir = 0;
        }

        //masukkan ke database
        if(count($this->selectedIds) > 0) {
            $i = $this->no_item_terakhir + 1;
            foreach($this->selectedIds as $id) {
                Isiberkas::where('id', $id)->update([
                    'no_berkas' => $this->no_berkas,
                    'id_berkas' => $this->id_berkas,
                    'no_item' => $i++
                ]);
            }
        }

        $this->dispatch('success', ['message' => 'Arsip berhasil diberkaskan']);
        $this->dispatch('refresh');
        $this->closeModalBerkaskan();
        $this->reset();
    }

    public function closeModalBerkaskan()
    {
        $this->reset('selectedIds');
        $this->dispatch('close-modal', 'modal-berkaskan');
    }

    public function editBerkas($id)
    {
        $enc_id_arsip = Isiberkas::find($id)->enc_id;
        $this->redirect('/daftar-berkas/isi-berkas/edit/'.$enc_id_arsip);
    }

    public function hapus($id)
    {
        $data_arsip = Isiberkas::find($id);
        $this->id_arsip = $data_arsip->id;
        $this->dispatch('open-modal', 'modal-hapus-arsip');
    }

    public function formHapusIsiBerkas()
    {
        $data_arsip = Isiberkas::find($this->id_arsip);
        $data_arsip->delete();

        $this->dispatch('success', ['message' => 'Arsip berhasil dihapus']);
        $this->dispatch('refresh');
        $this->closeModalHapusArsip();
        $this->reset();
    }

    public function closeModalHapusArsip()
    {
        $this->reset('id_arsip');
        $this->dispatch('close-modal', 'modal-hapus-arsip');
    }
}
