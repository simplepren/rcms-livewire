<?php

namespace App\Livewire\Berkas\Edit;

use App\Models\Unit;
use App\Models\Berkas;
use Livewire\Component;
use App\Models\Rakarsip;
use App\Models\Ruangarsip;
use App\Models\Klasifikasi;
use App\Models\Recordscenter;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;

class Index extends Component
{
    public $no_berkas;
    public $id_berkas;
    public $link_asal;

    #[Validate('required', message: 'Uraian Berkas harus diisi.')]
    public $uraian_berkas;

    #[Validate('required', message: 'Tahun harus diisi.')]
    public $tahun;

    #[Validate('required', message: 'Unit Pengolah harus diisi.')]
    public $unit_pengolah;

    #[Validate('required', message: 'Kode Klasifikasi harus diisi.')]
    public $kode_klas;

    #[Validate('required', message: 'Fungsi harus diisi.')]
    public $fungsi;

    #[Validate('required', message: 'Jenis arsip harus diisi.')]
    public $jenis_arsip;

    #[Validate('nullable')]
    public $folder_awal;

    #[Validate('nullable')]
    public $boks_awal;

    #[Validate('nullable')]
    public $lokasi_rc;

    #[Validate('nullable')]
    public $ruang;

    #[Validate('nullable')]
    public $rak;

    #[Validate('nullable')]
    public $boks;

    #[Validate('nullable')]
    public $folder;

    public $search_klas = [];
    public $klasifikasi;

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

    public function mount($id, $link_asal)
    {
        //link asal, akan redirect ke link ini setelah edit berkas
        $this->link_asal = $link_asal;

        //ambil data berkas
        $data_berkas = Berkas::where('enc_id', $id)->first();
        if(!$data_berkas){
            return abort(404);
        }else{
            $this->no_berkas = $data_berkas->no_berkas;
            $this->id_berkas = $data_berkas->id;
            $this->uraian_berkas = $data_berkas->uraian_berkas;
            $this->tahun = $data_berkas->tahun;
            $this->unit_pengolah = $data_berkas->unit_pengolah;
            $this->kode_klas = $data_berkas->kode_klas;
            $this->fungsi = $data_berkas->fungsi;
            $this->jenis_arsip = $data_berkas->jenis_arsip;
            $this->folder_awal = $data_berkas->folder_awal;
            $this->boks_awal = $data_berkas->boks_awal;
            $this->lokasi_rc = $data_berkas->lokasi_rc;
            $this->ruang = $data_berkas->ruang;
            $this->rak = $data_berkas->rak;
            $this->boks = $data_berkas->boks;
            $this->folder = $data_berkas->folder;
        }
    }

    public function render()
    {
        //data unit pengolah
        $data_unit = Unit::where('kode_unit', 'like', auth()->user()->kode_uk.'%')->get();

        return view('livewire.berkas.edit.index', [
            'data_rc' => Recordscenter::all(),
            'data_unit' => $data_unit
        ]);
    }

    public function updatedKodeKlas()
    {
        $this->klasifikasi = Klasifikasi::where(function($query) {
                                        $query->where('kode', 'like', '%'.$this->kode_klas.'%')
                                            ->orWhere('kode_clear', 'like', '%'.$this->kode_klas.'%')
                                            ->orWhere('fungsi', 'like', '%'.$this->kode_klas.'%');
                                        })
                                        ->whereNotNull('aktif') //biar ada data retensi nya
                                        ->get()->take(10);

        $this->search_klas = $this->klasifikasi;
    }

    public function selectedKoklas($id)
    {
        $data = Klasifikasi::find($id);
        $this->kode_klas = $data->kode;
        $this->fungsi = $data->fungsi;
        $this->search_klas = [];
    }

    public function formEdit()
    {
        $validated = $this->validate();

        //mengambil data klasifikasi
        $klasifikasi = Klasifikasi::where('kode', $this->kode_klas)->first();
        $validated['aktif'] = $klasifikasi->aktif;
        $validated['inaktif'] = $klasifikasi->inaktif;
        $validated['ket_musnah'] = $klasifikasi->keterangan;
        $validated['akses'] = $klasifikasi->akses;
        $validated['keamanan'] = $klasifikasi->keamanan;

        //masukkan ke database
        if($validated['lokasi_rc'] && $validated['ruang'] && $validated['rak'] && $validated['boks']) {
            $validated['kode_boks'] = $this->getKodeBoks($validated['lokasi_rc'], $validated['ruang'], $validated['rak'], $validated['boks']);
        }
        Berkas::where('id', $this->id_berkas)->update($validated);
        $this->dispatch('success',['message' => 'Data berkas berhasil diedit.']);
        $this->kembali();
    }

    public function updatedLokasiRc()
    {
        $this->reset('ruang', 'rak');
    }

    public function updatedRuang()
    {
        $this->reset('rak');
    }

    public function kembali()
    {
        if($this->link_asal == 'manuver-berkas'){
            $this->redirect('/manajemen-berkas/manuver-berkas');
        }elseif($this->link_asal == 'daftar-berkas'){
            $this->redirect('/daftar-berkas');
        }
    }

    public function getKodeBoks($rc, $ruang, $rak, $boks)
    {
        return $rc.'-'.$ruang.'-'.$rak.'-'.$boks;
    }
}
