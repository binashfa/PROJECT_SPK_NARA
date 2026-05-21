<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table = 'absensis';

    protected $fillable = [

        'user_id',
        'kelas_id',
        'status',
        'tanggal',
        'keterangan',
        'foto',
        'latitude',
        'longitude'
    ];

    // RELASI KELAS
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    // RELASI USER
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
