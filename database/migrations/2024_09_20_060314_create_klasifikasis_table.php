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
        Schema::create('klasifikasi', function (Blueprint $table) {
            $table->id();
            $table->string('kode_primer');
            $table->string('kode_sekunder')->nullable();
            $table->string('kode_tersier')->nullable();
            $table->string('kode')->unique();
            $table->string('kode_clear');
            $table->string('jenis_kode');
            $table->string('fungsi')->nullable();
            $table->text('deskripsi')->nullable();
            $table->text('arsip')->nullable();
            $table->string('keamanan')->nullable();
            $table->string('akses')->nullable();
            $table->integer('aktif')->nullable();
            $table->integer('inaktif')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('klasifikasi_tag')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('klasifikasi');
    }
};
