<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    protected $table = 'alumni';

    protected $fillable = [
        'photo',
        'name',
        'tahun_lulus',
        'jurusan',
        'testimoni',
    ];
}
