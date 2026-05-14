<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    protected $fillable = [
        'kelas_id',
        'judul',
        'deskripsi',
        'file'
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}