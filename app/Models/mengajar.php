<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class mengajar extends Model
{
    protected $fillable = [
        'lokal_id',
        'guru_id',
        'mapel_id',
    ];

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'mapel_id');
    }
}
