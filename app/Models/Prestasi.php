<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    // Tentukan nama tabel yang akan digunakan model ini
    protected $table = "prestasi";

    // Tentukan kolom yang bisa diisi secara massal
    protected $fillable = [
        'cover',          // untuk menyimpan path file cover
        'judul',          // judul prestasi
        'tahun_perolehan', // tahun perolehan prestasi
        'deskripsi',      // deskripsi prestasi
    ];
}
