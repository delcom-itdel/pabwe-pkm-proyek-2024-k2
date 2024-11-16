<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = "staff";  // Menyelaraskan nama tabel dengan tabel "staff" di database

    protected $fillable = [
        'photo',       // Kolom untuk path foto
        'name',        // Kolom untuk nama staff
        'group',       // Kolom untuk kelompok (misal: 'Staff Guru')
        'position',    // Kolom untuk jabatan staff
    ];
}
