<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    protected $fillable = [
        'nama',
        'tipe',
        'bobot'
    ];

    public function nilai()
    {
        return $this->hasMany(\App\Models\Nilai::class);
    }
}
