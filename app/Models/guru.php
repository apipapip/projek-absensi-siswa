<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Guru extends Authenticatable
{
    // Nama tabel (opsional jika sesuai konvensi Laravel)
    protected $table = 'gurus';

    // Kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'NIP',
        'nama',
        'no_telp',
        'jk',
        'mapel',
        'username',
        'password',
        'mapel_id',
        'user_id',
    ];

    // Kolom yang disembunyikan (misalnya untuk password hashing)
    protected $hidden = [
        'password',
    ];

    // Relasi ke model User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function lokals()
    {
        return $this->hasMany(Lokal::class, 'guru_id');
    }

    public function mengajars()
    {
        return $this->hasMany(Mengajar::class, 'guru_id');
    }

    public function absensis()
    {
        return $this->hasMany(absensi::class, 'guru_id');
    }
}
