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
        Schema::create('pemusnahan', function (Blueprint $table) {
            $table->id();
            $table->string('kode_uk');
            $table->string('id_pemusnahan');
            $table->string('nomor_nd');
            $table->string('tgl_nd');
            $table->string('nomor_nd_unit')->nullable();
            $table->string('tgl_nd_unit')->nullable();
            $table->string('unit_pengusul')->nullable();
            $table->string('file_daftar_usul_musnah')->nullable();
            $table->string('file_daftar_berkas')->nullable();
            $table->string('file_daftar_isi_berkas')->nullable();
            $table->string('file_kmk')->nullable();
            $table->string('progress')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemusnahan');
    }
};
