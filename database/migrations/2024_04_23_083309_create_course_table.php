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
        Schema::create('course', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->foreignId('level_id')->constrained('level')->onDelete('cascade')->onUpdate('cascade');
            $table->text('deskripsi');
            $table->string('modul');
            $table->string('header');
            $table->enum('status',['0','1']);
            $table->string('expired_date');
            $table->string('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course');
    }
};
