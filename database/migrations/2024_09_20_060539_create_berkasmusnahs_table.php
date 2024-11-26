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
        Schema::create('berkasmusnah', function (Blueprint $table) {
            $table->id();
            $table->string('id_pemusnahan');
            $table->string('id_berkas')->nullable();
            $table->string('uraian_berkas')->nullable();
            $table->string('kode_klas')->nullable();
            $table->string('fungsi')->nullable();
            $table->string('jumlah')->nullable();
            $table->string('tahun')->nullable();
            $table->string('perkembangan')->nullable();
            $table->string('kondisi')->nullable();
            $table->string('aktif')->nullable();
            $table->string('inaktif')->nullable();
            $table->string('ket_musnah')->nullable();
            $table->string('file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berkasmusnah');
    }
};
