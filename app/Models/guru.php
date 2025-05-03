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
}
