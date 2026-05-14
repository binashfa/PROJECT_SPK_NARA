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
        'matkul',
        'status',
        'file_tugas'
    ];

    // RELASI KE PENGUMPULAN
    public function pengumpulan()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
