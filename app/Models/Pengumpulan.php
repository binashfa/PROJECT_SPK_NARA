<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengumpulan extends Model
{
    protected $table = 'pengumpulan';

    protected $fillable = [

        'siswa_id',
        'tugas_id',
        'file',
        'nilai',
        'catatan'
    ];

    // RELASI SISWA
    public function siswa()
    {
        return $this->belongsTo(
            User::class,
            'siswa_id'
        );
    }

    // RELASI TUGAS
    public function tugas()
    {
        return $this->belongsTo(Tugas::class);
    }
}