<?php

namespace App\Http\Controllers;

use App\Models\Sarana;
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

    public function prestasi1()
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
        $data['sarana'] = Sarana::all();
        return view('app.saranaPrasarana', compact('data'));
    }
    public function beritaArtikel()
    {
        return view('app.beritaArtikel');
    }
    public function galeri1()
    {
        return view('app.galeri');
    }

    public function arsip1()
    {
        return view('app.arsip'); // Mengarah ke resources/views/app/arsip.blade.php
    }
    public function hubungiKami()
    {
        return view('app.hubungiKami'); // Mengarah ke resources/views/app/hubungiKami.blade.php
    }


}
