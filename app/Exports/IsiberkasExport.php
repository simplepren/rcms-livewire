<?php

namespace App\Exports;

use App\Models\Isiberkas;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class IsiberkasExport implements FromCollection, WithHeadings, WithMapping, WithTitle, ShouldAutoSize
{
    protected $data;

    public function __construct($data)
    {
        $kode_berkas = $data->pluck('id_berkas')->toArray();
        $data_arsip = Isiberkas::whereIn('id_berkas', $kode_berkas)->get();
        $this->data = $data_arsip;
    }

    public function collection()
    {
        return $this->data;
    }

    public function map($arsip): array
    {
        return [
            $arsip->no_berkas,
            $arsip->no_item,
            $arsip->no_registrasi,
            $arsip->uraian_isi_berkas,
            $arsip->kode_klas,
            $arsip->fungsi,
            $arsip->tanggal,
            $arsip->jumlah,
            $arsip->perkembangan,
            $arsip->kondisi,
            $arsip->bentuk,
            $arsip->media,
        ];
    }

    public function headings(): array
    {
        return [
            'No Berkas',
            'No Item',
            'No Registrasi',
            'Uraian Isi Berkas',
            'Kode Klas',
            'Fungsi',
            'Tanggal',
            'Jumlah',
            'Tk. Perkembangan',
            'Kondisi',
            'Bentuk',
            'Media',
        ];
    }

    public function title(): string
    {
        return 'Daftar Isi Berkas';
    }
}
