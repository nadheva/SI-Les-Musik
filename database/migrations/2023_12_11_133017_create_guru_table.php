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
        Schema::create('guru', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email');
            $table->string('no_telp');
            $table->string('lulusan');
            $table->string('tahun_lulus');
            $table->foreignId('alat_musik_id')->constrained('alatmusik')->onDelete('cascade')->onUpdate('cascade');
            $table->string('grade');
            // $table->string('lama_mengajar');
            $table->text('deskripsi');
            $table->string('foto');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guru');
    }
};
