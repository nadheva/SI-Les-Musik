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
        Schema::create('notification_log', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reservasi_id')->constrained('reservasi')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('user_create_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('approver_role_id')->constrained('role')->nullable()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('user_receiver_id')->constrained('users')->nullable()->onDelete('cascade')->onUpdate('cascade');
            $table->string('message');
            $table->enum('is_read',['0','1'])->default('0'); // 0 : belum dibaca, 1 : dibaca
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notification_log');
    }
};
