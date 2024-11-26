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
        Schema::create('isiberkas', function (Blueprint $table) {
            $table->id();
            $table->string('kode_uk');
            $table->string('enc_id')->unique();
            $table->string('id_berkas')->nullable();
            $table->string('no_berkas')->nullable();
            $table->integer('no_item')->nullable();
            $table->string('no_registrasi')->nullable();
            $table->text('uraian_isi_berkas');
            $table->string('kode_klas')->nullable();
            $table->string('fungsi')->nullable();
            $table->string('tanggal')->nullable();
            $table->integer('jumlah')->nullable();
            $table->string('perkembangan')->nullable();
            $table->string('kondisi')->nullable();
            $table->string('bentuk')->nullable();
            $table->string('media')->nullable();
            $table->string('folder_smt')->nullable();
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
        Schema::dropIfExists('isiberkas');
    }
};
