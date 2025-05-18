<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Siswa extends Authenticatable
{
    // Nama tabel (opsional jika sesuai konvensi Laravel)
    protected $table = 'siswas';

    // Kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'NISN',
        'nama',
        'jk',
        'no_telp',
        'jurusan',
        'username',
        'password',
        'user_id',
    ];

    // Kolom yang disembunyikan (misalnya untuk password hashing)
    protected $hidden = [
        'password',
    ];

    // Relasi ke model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke model Absensi
    public function absensis()
    {
        return $this->hasMany(absensi::class, 'siswa_id');
    }

    public function lokal()
{
    return $this->belongsTo(Lokal::class, 'lokal_id');
}
}
