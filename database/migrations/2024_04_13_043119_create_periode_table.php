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
        Schema::create('periode', function (Blueprint $table) {
            $table->id();
            $table->string('kode', '4');
            $table->string('nama_periode');
            $table->dateTime('tgl_awal_pendaftaran');
            $table->dateTime('tgl_akhir_pendaftaran');
            $table->dateTime('tgl_awal_pembelajaran');
            $table->dateTime('tgl_akhir_pembelajaran');
            $table->dateTime('tgl_awal_ujian');
            $table->dateTime('tgl_akhir_ujian');
            $table->enum('status',['0','1']); //0 : tdk aktif, 1 : aktif
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('periode');
    }
};
