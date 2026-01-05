<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $fillable = [
        'user_id',
        'nama',
        'no_anggota',
        'alamat',
        'no_hp'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
