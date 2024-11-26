<?php

namespace App\Imports;

use App\Models\Berkas;
use App\Models\Klasifikasi;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BerkasImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $data_klas = Klasifikasi::where('kode', $row['kode_klas'])->first();
        $fungsi = $data_klas->fungsi ?? '-';
        $akses = $data_klas->akses ?? null;
        $keamanan = $data_klas->keamanan ?? null;
        $aktif = $data_klas->aktif ?? null;
        $inaktif = $data_klas->inaktif ?? null;
        $ket_musnah = $data_klas->keterangan ?? null;

        return new Berkas([
            'enc_id' => Str::uuid(),
            'no_berkas' => $row['no_berkas'],
            'id_berkas' => $this->random_char(12),
            'kode_uk' => $row['kode_uk'],
            'uraian_berkas' => $row['uraian_berkas'],
            'unit_pengolah' => $row['unit_pengolah'],
            'kode_klas' => $row['kode_klas'],
            'fungsi' => $fungsi,
            'jumlah' => $row['jumlah'],
            'tahun' => $row['tahun'],
            'jenis_arsip' => $row['jenis_arsip'],
            'folder_awal' => $row['folder_awal'],
            'boks_awal' => $row['boks_awal'],
            'lokasi_rc' => $row['lokasi_rc'],
            'ruang' => $row['ruang'],
            'baris' => $row['baris'],
            'rak' => $row['rak'],
            'boks' => $row['boks'],
            'folder' => $row['folder'],
            'kode_boks' => $row['kode_boks'],
            'akses' => $akses,
            'keamanan' => $keamanan,
            'aktif' => $aktif,
            'inaktif' => $inaktif,
            'ket_musnah' => $ket_musnah,
            'created_by' => $row['created_by'],
        ]);
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
}
