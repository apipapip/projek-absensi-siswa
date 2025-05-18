<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class mapel extends Model
{
    protected $fillable = [
        'nama_mapel',
        'jadwal_mapel',
    ];

    public function jadwals()
    {
        return $this->hasMany(Jadwal::class, 'mapel_id');
    }

    public function mengajars()
    {
        return $this->hasMany(Mengajar::class, 'mapel_id');
    }
}
