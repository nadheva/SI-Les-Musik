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
        Schema::create('studio', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('foto');
            $table->longText('foto_detail');
            $table->longText('deskripsi');
            $table->foreignId('alat_musik_id')->constrained('alatmusik')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('studio');
    }
};
