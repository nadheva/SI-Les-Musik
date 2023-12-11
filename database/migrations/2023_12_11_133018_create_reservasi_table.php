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
        Schema::create('reservasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guru_id')->constrained('guru')->nullable()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('resepsionis_id')->constrained('resepsionis')->nullable()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->text('invoice');
            $table->date('tanggal_mulai');
            $table->date('tanggal_berakhir');
            $table->text('catatan');
            $table->enum('proses', ['Ditolak', 'Dalam Proses', 'Disetujui', 'Selesai'])->default('Dalam Proses');
            $table->bigInteger('grand_total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservasi');
    }
};
