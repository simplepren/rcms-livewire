<?php

use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Qrcodecontroller;

// Route::view('/', 'welcome');
Volt::route('/', 'frontpage.index')->name('frontpage');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', App\Livewire\Dashboard\Index::class)->name('dashboard');

    Route::get('/daftar-berkas', App\Livewire\Berkas\Daftar\Index::class)->name('daftar-berkas');
    Route::get('/berkas/edit/{id}/{link_asal}', App\Livewire\Berkas\Edit\Index::class)->name('edit-berkas');
    Route::get('/daftar-berkas/isi-berkas/{id}', App\Livewire\Isiberkas\Daftar\Index::class)->name('daftar-isi-berkas');
    Route::get('/daftar-berkas/isi-berkas/edit/{id_arsip}', App\Livewire\Isiberkas\Edit\Index::class);
    Route::get('/daftar-berkas/isi-berkas/edit/{id_arsip}/{id_berkas}', App\Livewire\Isiberkas\Edit\Index::class); //will be redirected to halaman daftar berkas -> isi berkas
    Route::get('/input-berkas/form', App\Livewire\Berkas\Input\Form::class)->name('form-input-berkas');
    Route::get('/input-berkas/upload', App\Livewire\Berkas\Input\Upload::class)->name('upload-input-berkas');
    Route::get('/daftar-arsip', App\Livewire\Isiberkas\Daftar\Index::class)->name('daftar-arsip');
    Route::get('/input-arsip/form', App\Livewire\Isiberkas\Input\Form::class)->name('form-input-arsip');
    Route::get('/input-arsip/upload', App\Livewire\Isiberkas\Input\Upload::class)->name('upload-input-arsip');

    //manajemen berkas
    Route::get('/manajemen-berkas/manuver-berkas', App\Livewire\Manajemenberkas\Manuver\Berkas\Index::class)->name('manajemen-berkas');
    Route::get('/manajemen-berkas/manuver-isi-berkas', App\Livewire\Manajemenberkas\Manuver\Isiberkas\Index::class)->name('manajemen-isi-berkas');
    Route::get('/manajemen-berkas/pindah-boks', App\Livewire\Manajemenberkas\Pindahboks\Index::class)->name('pindah-boks');

    //Peminjaman arsip
    Route::get('/layanan/peminjaman-arsip', App\Livewire\Layanan\Peminjaman\Index::class)->name('peminjaman-arsip');
    Volt::route('/layanan/peminjaman-arsip/cetak-bukti-peminjaman/{id}', 'layanan.peminjaman.cetak')->name('cetak-bukti-peminjaman');

    //QRCode generator
    Route::get('/manajemen-berkas/cetak-qrcode', App\Livewire\Manajemenberkas\Qrcode\Index::class)->name('cetak-qrcode');

    // Route::get('/qrcode-generator', [Qrcodecontroller::class, 'index'])->name('qrcode-generator');
    Volt::route('qrcode-generator', 'manajemenberkas.qrcode.qrcode-generator-new')->name('qrcode-generator');
    Volt::route('qrcode-generator-kosong', 'manajemenberkas.qrcode.qrcode-generator-kosong')->name('qrcode-generator-kosong');

    //Sarpras
    Route::get('/referensi/sarpras', App\Livewire\Sarpras\Index::class)->name('sarpras');
    Route::get('/referensi/klasifikasi-arsip', App\Livewire\Setup\Klasifikasi\Index::class)->name('klasifikasi')->middleware('admin');
    Route::get('/referensi/klasifikasi-arsip/edit/{id}', App\Livewire\Setup\Klasifikasi\Edit::class)->name('edit-klasifikasi')->middleware('admin');
    Route::get('/referensi/unit-pengolah', App\Livewire\Setup\Unit\Index::class)->name('unit-pengolah')->middleware('admin');

    //setup
    Route::get('/setup-user', App\Livewire\Setup\User\Index::class)->name('setup-user')->middleware('admin');
    Route::get('/referensi/unit-kearsipan', App\Livewire\Setup\Unitkearsipan\Index::class)->name('unit-kearsipan')->middleware('superadmin');

    //scan berkas
    Volt::route('scan-berkas', 'layanan.scan-berkas')->name('scan-berkas');
});


//signature
Volt::route('esign-peminjam/{id}', 'layanan.peminjaman.signature-peminjam')->name('esign-peminjam');
Volt::route('esign-petugas/{id}', 'layanan.peminjaman.signature-petugas')->name('esign-petugas');


//api data klasifikasi
Route::apiResource('/api/klasifikasi/', App\Http\Controllers\Api\KlasifikasiController::class);


require __DIR__.'/auth.php';
