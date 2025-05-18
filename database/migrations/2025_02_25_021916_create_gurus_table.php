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
        Schema::create('gurus', function (Blueprint $table) {
            $table->id();
            $table->string('NIP',20);
            $table->string('nama',30);
            $table->string('no_telp',13);
            $table->enum('jk', ['pria','wanita']);
            $table->string('mapel',20);
            $table->string('username');
            $table->string('password');
            $table->foreignId('mapel_id')->references('id')->on('mapels')->onDelete('cascade');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gurus');
    }
};
