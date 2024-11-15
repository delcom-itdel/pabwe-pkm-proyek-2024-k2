<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda dari default (opsional)
    protected $table = 'galeri';

    // Tentukan kolom-kolom yang dapat diisi secara massal
    protected $fillable = ['photo', 'description'];

    // Jika Anda ingin menonaktifkan timestamps, gunakan baris berikut:
    // public $timestamps = false;
}
