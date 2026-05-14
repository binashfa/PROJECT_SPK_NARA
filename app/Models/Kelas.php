<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';

    protected $fillable = [
        'nama_kelas',
        'tingkat',
        'wali_kelas',
        'start_time',
        'end_time',
        'ruangan'
    ];

    public function tugas()
    {
        return $this->hasMany(Tugas::class);
    }

    public function absensis()
    {
        return $this->hasMany(Absensi::class);
    }

    
}
