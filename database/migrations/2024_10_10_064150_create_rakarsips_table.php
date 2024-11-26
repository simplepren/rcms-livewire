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
        Schema::create('rakarsip', function (Blueprint $table) {
            $table->id();
            $table->string('kode_uk');
            $table->string('kode_rc');
            $table->string('kode_ruang');
            $table->string('nama_rak');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rakarsip');
    }
};