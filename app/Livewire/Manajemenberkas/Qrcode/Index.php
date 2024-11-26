<?php

namespace App\Livewire\Manajemenberkas\Qrcode;

use App\Models\Berkas;
use Livewire\Component;
use App\Models\Rakarsip;
use App\Models\Ruangarsip;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use App\Models\Recordscenter;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;
use Livewire\WithoutUrlPagination;
use Illuminate\Support\Facades\Session;

class Index extends Component
{
    use WithPagination, WithoutUrlPagination;
    public $perPage = 18;

    public $kode_boks = [];
    public $lokasi_rc;
    public $ruang;
    public $rak;

    #[Validate('required', message : "Kode klasifikasi tidak boleh kosong")]
    public $kode_klas;

    #[Validate('required', message : "Nomor boks tidak boleh kosong")]
    public $boks;

    #[Computed()]
    public function ruangan()
    {
        return Ruangarsip::where('kode_uk', auth()->user()->kode_uk)->where('kode_rc', $this->lokasi_rc)->get();
    }

    #[Computed()]
    public function rakArsip()
    {
        return Rakarsip::where('kode_uk', auth()->user()->kode_uk)->where('kode_rc', $this->lokasi_rc)->where('kode_ruang', $this->ruang)->get();
    }

    public function render()
    {
        $data_berkas = Berkas::where('kode_uk', auth()->user()->kode_uk)
                                ->whereNotNull('kode_boks')
                                ->when($this->lokasi_rc,function($query){
                                    return $query->where('lokasi_rc', $this->lokasi_rc);
                                })
                                ->when($this->ruang,function($query){
                                    return $query->where('ruang', $this->ruang);
                                })
                                ->when($this->rak,function($query){
                                    return $query->where('rak', $this->rak);
                                })
                                ->groupBy('kode_boks')
                                ->select('kode_boks', DB::raw('count(*) as total'))
                                ->paginate($this->perPage);

        $data_rc = Recordscenter::where('kode_uk', auth()->user()->kode_uk)->get();

        return view('livewire.manajemenberkas.qrcode.index',[
            'data_berkas' => $data_berkas,
            'data_rc' => $data_rc
        ]);
    }

    public function resetFilter()
    {
        $this->reset();
    }

    public function cetakQRCode()
    {
        Session::put('kode_boks', $this->kode_boks);
        $this->redirect('/qrcode-generator');
    }

    public function cetakBoksKosong()
    {
        $this->dispatch('open-modal', 'modal-cetak-boks-kosong');
    }

    public function formCetakBoksKosong()
    {
        $validated = $this->validate();
        $all_boks = Str::of($validated['boks'])->explode(',');
        $data_boks = [
            'lokasi_rc' => $this->lokasi_rc,
            'ruang' => $this->ruang,
            'rak' => $this->rak,
            'kode_klas' => $this->kode_klas
        ];
        foreach($all_boks as $boks) {
            if(Str::contains($boks, '.')) {
                $this->dispatch('error', ['message' => 'Nomor boks harus angka bulat']);
                return;
            }else{
                $no_boks[] = $boks;
                $kode_boks[] = $this->lokasi_rc . '-' . $this->ruang . '-' . $this->rak . '-' . $boks;
            }
        }
        $data_boks['no_boks'] = $no_boks;
        $data_boks['kode_boks'] = $kode_boks;
        Session::put('data_boks', $data_boks);
        $this->redirect('/qrcode-generator-kosong');
    }

    public function closeModalCetakBoks()
    {
        $this->dispatch('close-modal', 'modal-cetak-boks-kosong');
        Session::forget('data_boks');
        $this->reset();
    }
}
