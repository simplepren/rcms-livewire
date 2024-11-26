<?php

namespace App\Imports;

use App\Models\Isiberkas;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class IsiberkasImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Isiberkas([
            'kode_uk' => $row['kode_uk'],
            'enc_id' => Str::uuid(),
            'id_berkas' => $row['id_berkas'],
            'no_berkas' => $row['no_berkas'],
            'no_item' => $row['no_item'],
            'no_registrasi' => $row['no_registrasi'],
            'uraian_isi_berkas' => $row['uraian_isi_berkas'],
            'kode_klas' => $row['kode_klas'],
            'fungsi' => $row['fungsi'],
            'tanggal' => $row['tanggal'],
            'jumlah' => $row['jumlah'],
            'perkembangan' => $row['perkembangan'],
            'kondisi' => $row['kondisi'],
            'bentuk' => $row['bentuk'],
            'media' => $row['media'],
            'folder_smt' => $row['folder_smt'],
            'created_by' => $row['created_by'],
            // 'created_at' => Carbon::now(),
            // 'updated_at' => Carbon::now(),
        ]);
    }
}
