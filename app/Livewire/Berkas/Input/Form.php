<?php

namespace App\Livewire\Berkas\Input;

use App\Models\Unit;
use App\Models\Berkas;
use Livewire\Component;
use App\Models\Rakarsip;
use App\Models\Ruangarsip;
use App\Models\Klasifikasi;
use Illuminate\Support\Str;
use App\Models\Recordscenter;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;

class Form extends Component
{
    #[Validate('required')]
    public $no_berkas;

    #[Validate('required')]
    public $id_berkas;

    #[Validate('required')]
    public $kode_uk;

    #[Validate('required', message: 'Tahun harus diisi.')]
    #[Validate('numeric', message: 'Tahun harus angka.')]
    public $tahun;

    #[Validate('required', message: 'Uraian berkas harus diisi.')]
    public $uraian_berkas;

    #[Validate('required', message: 'Unit pengolah harus diisi.')]
    public $unit_pengolah;

    #[Validate('required', message: 'Kode klasifikasi harus diisi.')]
    public $kode_klas;

    #[Validate('required', message: 'Uraian berkas harus diisi.')]
    public $fungsi;

    #[Validate('required', message: 'Jenis berkas harus diisi.')]
    public $jenis_arsip;

    #[Validate('required')]
    public $jumlah;

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

    public function render()
    {
        $this->no_berkas = Berkas::where('kode_uk', auth()->user()->kode_uk)->max('no_berkas') + 1;
        $this->kode_uk = auth()->user()->kode_uk;
        $this->id_berkas = $this->random_char(12);
        $this->jumlah = 1;
        $this->jenis_arsip = 'umum';

        //data rc
        $data_rc = Recordscenter::where('kode_uk', auth()->user()->kode_uk)->get();

        //data ruangan
        $data_ruangan = Ruangarsip::all();

        //data rak
        $data_rak = Rakarsip::all();

        //data unit pengolah
        $data_unit = Unit::where('kode_unit', 'like', auth()->user()->kode_uk.'%')->get();

        return view('livewire.berkas.input.form', [
            'data_rc' => $data_rc,
            'data_unit' => $data_unit
        ]);
    }

    public function formInput()
    {
        $validated = $this->validate();

        //menambahkan encrypted id
        $validated['enc_id'] = Str::uuid();

        //mengambil data klasifikasi
        $klasifikasi = Klasifikasi::where('kode', $this->kode_klas)->first();
        $validated['aktif'] = $klasifikasi->aktif;
        $validated['inaktif'] = $klasifikasi->inaktif;
        $validated['ket_musnah'] = $klasifikasi->keterangan;
        $validated['akses'] = $klasifikasi->akses;
        $validated['keamanan'] = $klasifikasi->keamanan;

        //menambahkan user yang menginput
        $validated['created_by'] = auth()->user()->nip;

        //masukkan ke database
        if($validated['lokasi_rc'] && $validated['ruang'] && $validated['rak'] && $validated['boks']) {
            $validated['kode_boks'] = $this->getKodeBoks($validated['lokasi_rc'], $validated['ruang'], $validated['rak'], $validated['boks']);
            $validated['folder'] = $this->getFolder($validated['lokasi_rc'], $validated['ruang'], $validated['rak'], $validated['boks']);
        }

        //pastikan kembali nomor berkas agar tidak terjadi duplikasi
        $no_berkas = Berkas::where('kode_uk', auth()->user()->kode_uk)->max('no_berkas') + 1;
        $validated['no_berkas'] = $no_berkas;

        //masukkan ke database
        Berkas::create($validated);
        $this->dispatch('success',['message' => 'Berkas berhasil ditambahkan.']);
        $this->reset();
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

    public function updatedLokasiRc()
    {
        $this->reset('ruang', 'rak');
    }

    public function updatedRuang()
    {
        $this->reset('rak');
    }

    public function resetForm()
    {
        $this->reset();
    }

    public function random_char($length)
    {
        $char = 'ABCDEFGHJKLMN123456789123456789';
        $string = '';
        for ($i=0; $i < $length; $i++) {
            $pos = rand(0,strlen($char)-1);
            $string .= $char[$pos];
        }
        return $string;
    }

    public function getKodeBoks($rc, $ruang, $rak, $boks)
    {
        return $rc.'-'.$ruang.'-'.$rak.'-'.$boks;
    }

    public function getFolder($rc, $ruang, $rak, $boks)
    {
        $last_folder = Berkas::where('lokasi_rc', $rc)->where('ruang', $ruang)->where('rak', $rak)->where('boks', $boks)->latest()->first();
        if($last_folder) {
            $folder = $last_folder->folder + 1;
        }else{
            $folder = 1;
        }
        return $folder;
    }
}
