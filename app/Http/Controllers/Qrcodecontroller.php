<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class Qrcodecontroller extends Controller
{
    public function index(){
        $kode_boks = Session::get('kode_boks');
        $test = QrCode::size(120)->generate('https://www.google.com');
        return view('qrcode', [
            'qrcode' => $test,
            'kode_boks' => $kode_boks
        ]);
    }
}
