<?php

namespace App\Http\Controllers\Api;

use App\Models\Klasifikasi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\KlasifikasiResource;

class KlasifikasiController extends Controller
{
    public $query;

    public function index($query)
    {
        $this->query = $query;
        $klasifikasi = Klasifikasi::where(function($qry) {
            $qry->where('kode', 'like', '%'.$this->query.'%')
                ->orWhere('kode_clear', 'like', '%'.$this->query.'%')
                ->orWhere('fungsi', 'like', '%'.$this->query.'%');
            })
            ->whereNotNull('aktif') //biar ada data retensi nya
            ->get()->take(10);

        return new KlasifikasiResource(true, 'Data Klasifikasi', $klasifikasi);
    }
}
