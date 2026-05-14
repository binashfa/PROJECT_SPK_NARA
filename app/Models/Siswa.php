<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable = [
        'nis',
        'nama',
        'kelas'
    ];

    public function nilai()
    {
        return $this->hasMany(\App\Models\Nilai::class);
    }

    public function pengumpulan()
{
    return $this->hasMany(Pengumpulan::class);
}
}
