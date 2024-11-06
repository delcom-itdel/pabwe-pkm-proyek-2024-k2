<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformasiDasar extends Model
{
  use HasFactory;

  // Tentukan field yang bisa di-mass assign
  protected $fillable = [
    'kontak_phone',
    'kontak_email',
    'nama_lokasi'
  ];
}
