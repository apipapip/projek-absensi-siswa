<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class jadwal extends Model
{
    protected $fillable = [
        'lokal_id',
        'mapel_id',
    ];

    public function lokal()
    {
        return $this->belongsTo(Lokal::class, 'lokal_id');
    }

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'mapel_id');
    }
}
