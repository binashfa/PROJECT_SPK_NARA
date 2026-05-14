<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = 'nilais';

    protected $fillable = [
        'user_id',
        'kelas_id',
        'judul',
        'nilai',
        'keterangan'
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