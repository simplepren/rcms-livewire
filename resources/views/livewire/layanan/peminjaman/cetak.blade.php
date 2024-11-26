<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;
use App\Models\Peminjaman;
use App\Models\Berkas;

new
#[Layout('layouts.layout-qrcode')]

class extends Component {
    public $id_peminjaman;
    public $esign_peminjam;
    public $nama_petugas;
    public $esign_petugas;
    public $enc_id;
    public $nama;
    public $unit;
    public $data_pinjam;

    public function mount($id)
    {
        $data = Peminjaman::where('id_peminjaman', $id)->first();
        if($data){
            $this->data_pinjam = Peminjaman::where('id_peminjaman', $id)->get();
            $this->id_peminjaman = $data->id_peminjaman;
            $this->esign_peminjam = $data->esign_peminjam;
            $this->esign_petugas = $data->detailPetugas->esign;
            $this->enc_id = $data->enc_id;
            $this->nama = $data->nama;
            $this->unit = $data->detailUnit->nama_unit ?? $data->unit;
            $this->nama_petugas = $data->detailPetugas->name;
            // dd($this->nama_peminjam);
        }else{
            return abort(404);
        }
    }
}; ?>

<div class="flex justify-center">
    <div class="p-3" style="width: 210mm; height: 297mm"> <!-- A4 docs 210mm x 297mm -->
        <div class="">
            <div class="mb-1 w-48 h-14 text-center bg-slate-700 text-white text-xl font-bold p-4">BUKTI PINJAM</div>
            <div class="text-sm mb-1">Kode: {{ $id_peminjaman }}</div>
        </div>
        <div class="mt-4 mb-3 border-b-2 border-gray-400"></div>
        <div>
            <div class="mb-1 italic font-semibold text-lg text-amber-700">Peminjam</div>
            <div class="text-2xl">{{ $nama }}</div>
            <div class="text-sm">{{ $unit }}</div>
        </div>
        <div class="mt-10">
            <table class="w-full">
                <thead class="text-sm text-amber-700">
                    <tr class="border-b-2 border-gray-300">
                        <th class="py-1">No. Berkas</th>
                        <th class="">Uraian Berkas</th>
                        <th>Keperluan</th>
                        <th>Tgl Pinjam</th>
                        <th>Tgl Kembali</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_pinjam as $item)
                        <tr class="text-sm border-b-2 border-gray-300">
                            <td class="text-center h-8">{{ $item->detailBerkas->no_berkas ?? '-' }}</td>
                            <td>{{ $item->uraian_berkas }}</td>
                            <td class="text-center">{{ $item->keperluan }}</td>
                            <td class="text-center">{{ $item->tgl_pinjam }}</td>
                            <td class="text-center">{{ $item->tgl_kembali }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-10">
            <div class="grid grid-cols-2">
                <div class="flex justify-center">
                    <div>
                        <div class="text-center text-sm mb-3">Peminjam</div>
                        @if ($esign_peminjam)
                            <div class="h-22"><img src="{{ asset('assets/images/signature/'.$esign_peminjam) }}" alt="" width="170px"></div>
                        @else
                            <div class="h-22"><img src="{{ asset('assets/images/signature/no-signature.png') }}" alt="" width="170px"></div>
                        @endif
                        <div class="text-center mt-2 text-sm">{{ $nama }}</div>
                    </div>
                </div>
                <div class="flex justify-center">
                    <div>
                        <div class="text-center text-sm mb-3">Petugas/Arsiparis</div>
                        @if ($esign_petugas)
                            <div class="h-22"><img src="{{ asset('assets/images/signature/'.$esign_petugas) }}" alt="" width="170px"></div>
                        @else
                            <div class="h-22"><img src="{{ asset('assets/images/signature/no-signature.png') }}" alt="" width="170px"></div>
                        @endif
                        <div class="text-center mt-2 text-sm">{{ $nama_petugas }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
