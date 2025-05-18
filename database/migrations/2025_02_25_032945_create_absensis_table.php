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
        Schema::create('absensis', function (Blueprint $table) {
            $table->id();
            $table->time('jam');
            $table->date('tanggal');
            $table->enum('status',['hadir','sakit','izin','alfa']);
            $table->string('keterangan')->nullable();
            $table->foreignId('guru_id')->references('id')->on('gurus')->onDelete('cascade');
            $table->foreignId('siswa_id')->references('id')->on('siswas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensis');
    }
};
