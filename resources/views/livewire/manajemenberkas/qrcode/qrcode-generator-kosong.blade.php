<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Session;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Str;
use App\Models\Berkas;
use App\Models\Unit;

new
#[Layout('layouts.layout-qrcode')]

class extends Component
{
    public $es1;

    public function mount()
    {
        $unit = Unit::where('kode_uk', auth()->user()->kode_uk)->first();
        $this->es1 = Str::upper($unit->es1);
    }

    public function with()
    {
        $data_boks = Session::get('data_boks');
        return [
            'data_boks' => $data_boks
        ];
    }

    public function kembali()
    {
        Session::forget('kode_boks');
        $this->redirect('/manajemen-berkas/cetak-qrcode');
    }
};
?>

<div class="flex justify-center">
    <div style="width: 210mm; height: 297mm">
        <div class="mb-4">
            <button wire:click="kembali" class="text-gray-700 underline">Kembali</button>
        </div>
        <div class="grid grid-cols-2 gap-3">
            @foreach ($data_boks['kode_boks'] as $key => $boks)
                <div class="border-2 border-gray-400">
                    <div class="p-1 flex">
                        <div class="py-1 flex justify-center bg-teal-500" style="width: 120px; height: 138px">
                            <div>
                                <div class="bg-white w-28 h-28 py-1 flex justify-center">
                                    <div>{{ QrCode::size(100)->generate($boks) }}</div>
                                </div>
                                <div class="flex justify-center items-center">
                                    <span class="text-white font-semibold text-sm">{{ $boks }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="pt-1 px-2" style="width: 260px">
                            <div class="flex justify-between">
                                <div><img src="{{ asset('assets/images/logo/kemenkeu-color.png') }}" width="40px"></div>
                                <div class="p-1 border border-gray-400">
                                    <span class="text-xl font-bold text-teal-500">
                                        {{ $data_boks['kode_klas'] }}
                                    </span>
                                </div>
                            </div>
                            <div class="mt-1">
                                <div>
                                    <div style="font-size: 13px">KEMENTERIAN KEUANGAN</div>
                                    <div style="font-size: 10px">{{ $es1 }}</div>
                                </div>
                            </div>
                            <div class="mt-4 flex gap-2">
                                <div class="border border-gray-400">
                                    <div class="flex px-1 justify-center">
                                        <span style="font-size: 9px">RC</span>
                                    </div>
                                    <div class="px-2 flex justify-center items-center">
                                        <span class="text-xl font-bold text-teal-500">
                                            {{ $data_boks['lokasi_rc'] }}
                                        </span>
                                    </div>
                                </div>
                                <div class="border border-gray-400">
                                    <div class="flex px-1 justify-center">
                                        <span style="font-size: 9px">Ruang</span>
                                    </div>
                                    <div class="px-2 flex justify-center items-center">
                                        <span class="text-xl font-bold text-teal-500">
                                            {{ $data_boks['ruang'] }}
                                        </span>
                                    </div>
                                </div>
                                <div class="border border-gray-400">
                                    <div class="flex px-1 justify-center">
                                        <span style="font-size: 9px">Rak</span>
                                    </div>
                                    <div class="px-2 flex justify-center items-center">
                                        <span class="text-xl font-bold text-teal-500">
                                            {{ $data_boks['rak'] }}
                                        </span>
                                    </div>
                                </div>
                                <div class="border border-gray-400">
                                    <div class="flex px-1 justify-center">
                                        <span style="font-size: 9px">Boks</span>
                                    </div>
                                    <div class="px-2 flex justify-center items-center">
                                        <span class="text-xl font-bold text-teal-500">
                                            {{ $data_boks['no_boks'][$key] }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
