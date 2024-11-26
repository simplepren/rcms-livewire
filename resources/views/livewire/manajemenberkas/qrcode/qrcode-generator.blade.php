<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Session;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Berkas;

new
#[Layout('layouts.layout-qrcode')]

class extends Component
{
    public function with()
    {
        $kode_boks = Session::get('kode_boks');
        if($kode_boks){
            $data_boks = Berkas::whereIn('kode_boks', $kode_boks)->get();
            $data_berkas = $data_boks->groupBy('kode_boks');
            // dd($data_berkas);
            return [
                'data_berkas' => $data_berkas
            ];
        }else{
            return [
                'data_berkas' => []
            ];
        }
    }

    public function kembali()
    {
        Session::forget('kode_boks');
        $this->redirect('/manajemen-berkas/cetak-qrcode');
    }
};
?>

<div>
    <div class="mb-4">
        <button wire:click="kembali" class="text-gray-700 underline">Kembali</button>
    </div>
    <div class="grid grid-cols-2 gap-3">
        @foreach ($data_berkas as $berkas)
            @foreach ($berkas as $item)
            <div class="flex gap-2 w-full px-4 py-3 border-2 border-gray-700">
                <div class="w-32 flex justify-center items-center">
                    {{ QrCode::size(120)->generate($item->kode_boks) }}
                </div>
                <div class="w-10 flex items-center justify-center bg-gray-300">
                    <div class="-rotate-90 font-semibold">{{ $item->tahun }}</div>
                </div>
                <div class="">
                    <div class="flex gap-2 mb-2">
                        <div class="w-16 flex justify-center">
                            <img src="{{ asset('assets/images/logo/kemenkeu-color.png') }}" width="60px">
                        </div>
                        <div>
                            <div class="text-sm uppercase">Kementerian Keuangan</div>
                            <div class="text-sm">Badan Pendidikan dan Pelatihan Keuangan</div>
                        </div>
                    </div>
                    <div class="text-xl font-semibold mb-1">{{ $item->kode_boks }}</div>
                    <div class="text-sm">{{ $item->unit->nama_unit ?? '-' }}</div>
                    <div class="text-sm">{{ $item->kode_klas . ' - ' . $item->fungsi }}</div>
                </div>
            </div>
            @endforeach
        @endforeach
    </div>
</div>
