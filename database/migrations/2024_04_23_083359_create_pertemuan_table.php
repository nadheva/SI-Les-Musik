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
        Schema::create('pertemuan', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->foreignId('course_id')->constrained('course')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('guru_id')->constrained('guru')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('studio_id')->constrained('studio')->onDelete('cascade')->onUpdate('cascade');
            $table->text('deskripsi');
            $table->enum('attendance',['0','1']);
            $table->dateTime('waktu_mulai');
            $table->dateTime('waktu_selesai');
            $table->string('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pertemuan');
    }
};
