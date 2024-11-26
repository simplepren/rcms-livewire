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
        Schema::create('recordscenter', function (Blueprint $table) {
            $table->id();
            $table->string('kode_uk');
            $table->string('kode_rc');
            $table->string('nama_rc');
            $table->string('alamat');
            $table->string('telp')->nullable();
            $table->string('kepemilikan')->nullable();
            $table->string('jml_lantai')->nullable();
            $table->string('luas')->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recordscenter');
    }
};
