<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilInformasiDasar extends Model
{
  use HasFactory;

  protected $table = 'profil_informasi_dasar';

  protected $fillable = [
    'sejarah',
    'visi',
    'misi',
    'struktur_organisasi',
    'program_sekolah',
  ];
}