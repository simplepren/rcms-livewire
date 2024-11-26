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
        Schema::create('unit', function (Blueprint $table) {
            $table->id();
            $table->string('kode_uk');
            $table->string('kode_unit')->unique();
            $table->string('es1_akr');
            $table->string('es1');
            $table->string('nama_unit');
            $table->string('alamat_kop1')->nullable();
            $table->string('alamat_kop2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unit');
    }
};
