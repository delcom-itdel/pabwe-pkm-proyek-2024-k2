<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformasiDasar extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak mengikuti konvensi Laravel
    protected $table = 'informasi_dasars';

    // Tentukan field yang bisa di-mass assign
    protected $fillable = [
        'kontak_phone',
        'kontak_email',
        'nama_lokasi',
        'alamat_lokasi',
        'peta_lokasi',
        'instagram',
        'youtube',
        'tiktok',
        'facebook',
        'twitter',
        'highlight',
        'sub_highlight',
        'cover',
        'judul_video',
        'link_video',
        'jumlah_peserta_didik',
        'jumlah_guru',
        'jumlah_kelas',
        'foto_kepala_sekolah',
        'nama_kepala_sekolah',
        'sambutan_kepala_sekolah',
    ];

    // Tentukan tipe kolom jika ingin menggunakan casting untuk tipe data tertentu
    //protected $casts = [
    //'jumlah_peserta_didik' => 'integer',
    //'jumlah_guru' => 'integer',
    //'jumlah_kelas' => 'integer',
    //];

    // Menambahkan accessor atau mutator jika diperlukan
    // Misalnya, jika perlu memformat nilai tertentu sebelum disimpan atau ditampilkan

    // Contoh mutator untuk menyimpan nomor telepon dengan format tertentu
    //public function setKontakPhoneAttribute($value)
    //{
    //$this->attributes['kontak_phone'] = preg_replace('/\D/', '', $value); // Menghapus karakter selain angka
    //}

    // Contoh accessor untuk mendapatkan nomor telepon dengan format tertentu
    //public function getKontakPhoneAttribute($value)
    //{
    //return '(' . substr($value, 0, 3) . ') ' . substr($value, 3, 3) . '-' . substr($value, 6, 4); // Format nomor telepon
    //}
}
