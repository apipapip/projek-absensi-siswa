<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    // Nama tabel (opsional jika sesuai konvensi Laravel)
    protected $table = 'jurusans';

    // Kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'nama_jurusan',
        'kode_jurusan',
    ];

    // Tambahkan relasi jika diperlukan
    // Contoh: Jika jurusan memiliki banyak siswa
    // public function siswa()
    // {
    //     return $this->hasMany(Siswa::class);
    // }

    public function lokals()
    {
        return $this->hasMany(Lokal::class, 'jurusan_id');
    }
}
