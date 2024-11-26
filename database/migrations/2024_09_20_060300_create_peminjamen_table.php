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
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();
            $table->string('kode_uk');
            $table->string('enc_id');
            $table->string('id_peminjaman');
            $table->string('nip')->nullable();
            $table->string('nama');
            $table->string('unit');
            $table->string('id_berkas');
            $table->string('uraian_berkas');
            $table->string('tgl_pinjam');
            $table->string('keperluan');
            $table->string('tgl_kembali')->nullable();
            $table->string('petugas')->nullable();
            $table->string('esign_peminjam')->nullable();
            $table->string('esign_petugas')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};
