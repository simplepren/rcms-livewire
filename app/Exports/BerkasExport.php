<?php

namespace App\Exports;

use App\Models\Berkas;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class BerkasExport implements FromCollection, WithHeadings, WithMapping, WithTitle, ShouldAutoSize
{
    // use Exportable;

    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return $this->data;
    }

    public function map($berkas): array
    {
        return [
            $berkas->no_berkas,
            $berkas->uraian_berkas,
            $berkas->unit->nama_unit ?? $berkas->unit_pengolah,
            $berkas->tahun,
            $berkas->kode_klas,
            $berkas->fungsi,
            $berkas->keamanan,
            $berkas->akses,
            $berkas->aktif,
            $berkas->inaktif,
            $berkas->ket_musnah,
            $berkas->lokasi_rc,
            $berkas->ruang,
            $berkas->rak,
            $berkas->boks,
            $berkas->kode_boks,
            $berkas->boks_awal,
        ];
    }

    public function headings(): array
    {
        return [
            'No Berkas',
            'Uraian Berkas',
            'Unit Pengolah',
            'Tahun',
            'Kode Klas',
            'Fungsi',
            'Klasifikasi Keamanan',
            'Hak Akses',
            'Aktif',
            'Inaktif',
            'Keterangan',
            'Lokasi RC',
            'Ruang',
            'Rak',
            'No. Boks',
            'Kode Boks',
            'Boks Sementara'
        ];
    }

    public function title(): string
    {
        return 'Daftar Berkas';
    }

}
