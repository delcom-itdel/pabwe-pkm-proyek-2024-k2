<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function sejarah()
    {
        return view('app.sejarah');
    }

    public function visiMisi()
    {
        return view('app.visi-misi');
    }

    public function struktur()
    {
        return view('app.struktur');
    }

    public function program()
    {
        return view('app.program');
    }

    public function staf()
    {
        return view('app.staf');
    }

    public function prestasi()
    {
        return view('app.prestasi');
    }

    public function alumni()
    {
        return view('app.alumni');
    }

    public function ppdb()
    {
        return view('app.ppdb');
    }

    // Tambahkan fungsi untuk Berita & Artikel
    public function beritaArtikel()
{
    return view('app.beritaArtikel');
}
public function galeri()
{
    return view('app.galeri'); // Mengarah ke resources/views/app/galeri.blade.php
}

}