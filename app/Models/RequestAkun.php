<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestAkun extends Model
{
    protected $fillable = ['nama','email','role','status'];
}
