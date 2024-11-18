<?php

namespace App\Http\Controllers;

use App\Models\Sarana;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\BeritaArtikel;
use App\Models\Alumni;
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

    public function prestasi1()
    {
        return view('app.prestasi');
    }

    public function alumni()
    {
        $data['alumni'] = Alumni::all();
        return view('app.alumni', compact('data'));
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
        $data['berita'] = BeritaArtikel::all();
        return view('app.beritaArtikel', compact('data'));
    }
    public function galeri1()
    {
        return view('app.galeri');
    }

    public function arsip1()
    {
        return view('app.arsip');
    }
    public function hubungiKami()
    {
        return view('app.hubungiKami');
    }
}