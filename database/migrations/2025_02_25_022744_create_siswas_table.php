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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('NISN',20);
            $table->string('nama',30);
            $table->enum('jk',['laki-laki','perempuan']);
            $table->string('no_telp',13);
            $table->string('jurusan',30);
            $table->string('username',30);
            $table->string('password',30);
            $table->foreignId('user_id')->references('id')->on('penggunas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
