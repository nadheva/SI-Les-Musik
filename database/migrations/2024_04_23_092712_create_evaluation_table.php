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
        Schema::create('evaluation', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->foreignId('course_id')->constrained('course')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('guru_id')->constrained('guru')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('grade')->nullable();
            $table->enum('status', ['0','1', '2'])->nullable(); //0 : tidak lulus, 1 : lulus, 2 : lulus dengan syarat
            $table->longText('catatan')->nullable();
            $table->enum('attendance',['0','1']); //0 : tidak hadir, 1 : hadir
            $table->string('created_by');
            $table->string('waktu_pelaksanaan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluation');
    }
};
