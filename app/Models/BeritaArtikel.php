<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class BeritaArtikel extends Model
{
    protected $table = 'berita_artikel';

    protected $fillable = [
        'cover',
        'judul',
        'tindakan',
    ];
}
