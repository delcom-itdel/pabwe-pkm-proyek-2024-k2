<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeritaArtikel extends Model
{
    use HasFactory; // Menambahkan trait HasFactory

    // Menentukan nama tabel yang sesuai
    protected $table = 'berita_artikel'; // Menggunakan snake_case untuk nama tabel

    // Menentukan atribut yang dapat diassign secara massal
    protected $fillable = [
        'cover',
        'judul',
        'tindakan',
    ];
}
