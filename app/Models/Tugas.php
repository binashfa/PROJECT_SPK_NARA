<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    protected $table = 'tugas';

    protected $fillable = [

        'kelas_id',
        'judul',
        'deskripsi',
        'deadline',
        'status',
        'file_tugas'
    ];

    // RELASI KE KELAS
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    // RELASI PENGUMPULAN
    public function pengumpulan()
    {
        return $this->hasMany(Pengumpulan::class);
    }
}
