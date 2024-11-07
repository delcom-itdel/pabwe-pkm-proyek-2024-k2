<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function sejarah()
    {
        return view('app.sejarah'); // Mengarah ke resources/views/app/sejarah.blade.php
    }

    public function visiMisi()
    {
        return view('app.visi-misi'); // Mengarah ke resources/views/app/visi-misi.blade.php
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

    public function saranaPrasarana()
    {
        return view('app.saranaPrasarana');
    }
    public function beritaArtikel()
    {
        return view('app.beritaArtikel');
    }
    public function galeri()
    {
        return view('app.galeri');
    }
}
