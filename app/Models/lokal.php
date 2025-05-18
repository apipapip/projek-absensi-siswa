<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class lokal extends Model
{
    // Nama tabel (opsional jika sesuai konvensi Laravel)
    protected $table = 'lokals';

    // Kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'nama',
        'jurusan_id',
        'guru_id',
    ];

    // Relasi ke model Jurusan
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }

    // Relasi ke model Jurusan
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }

    // Relasi ke model Jadwal
    public function jadwals()
    {
        return $this->hasMany(Jadwal::class, 'lokal_id');
    }
}
