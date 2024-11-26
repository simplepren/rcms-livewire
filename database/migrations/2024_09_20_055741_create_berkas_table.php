<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('berkas', function (Blueprint $table) {
            $table->id();
            $table->string('enc_id')->unique();
            $table->integer('no_berkas');
            $table->string('id_berkas')->unique();
            $table->string('kode_uk');
            $table->text('uraian_berkas', 1000);
            $table->string('unit_pengolah');
            $table->string('kode_klas');
            $table->string('fungsi');
            $table->integer('jumlah')->default(1);
            $table->integer('tahun');
            $table->string('jenis_arsip')->comment('Arsip umum, arsip vital, arsip terjaga');
            $table->string('folder_awal')->nullable();
            $table->string('boks_awal')->nullable();
            $table->string('lokasi_rc')->nullable();
            $table->string('ruang')->nullable();
            $table->string('baris')->nullable();
            $table->string('rak')->nullable();
            $table->string('tingkat')->nullable();
            $table->string('boks')->nullable();
            $table->string('folder')->nullable();
            $table->string('kode_boks')->nullable();
            $table->string('akses')->nullable();
            $table->string('keamanan')->nullable();
            $table->integer('aktif')->nullable();
            $table->integer('inaktif')->nullable();
            $table->string('ket_musnah')->nullable();
            $table->integer('status_musnah')->default(0)->comment('0 = aktif, 1 = musnah');
            $table->string('file_name')->nullable();
            $table->string('created_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berkas');
    }
};
