<?php

namespace App\Http\Controllers;

use App\Models\ProfilInformasiDasar;
use Illuminate\Http\Request;

class ProfilInformasiDasarController extends Controller
{
    // Metode untuk menampilkan halaman Admin
    public function edit()
    {
        // Ambil data pertama dari tabel
        $data = ProfilInformasiDasar::first();
        // Kirim data ke view admin
        return view('app.admin.informasi3', compact('data'));
    }

    // Metode untuk menyimpan data dari halaman Admin
    public function save(Request $request)
    {
        $validatedData = $request->validate([
            'sejarah' => 'required|string',
            'visi' => 'required|string',
            'misi' => 'required|string',
            'struktur_organisasi' => 'required|string',
            'program_sekolah' => 'required|string',
        ]);

        ProfilInformasiDasar::updateOrCreate([], $validatedData);

        // Pengalihan kembali ke halaman admin setelah penyimpanan
        return redirect()->route('profilInformasiDasar.edit')->with('success', 'Informasi profil berhasil disimpan.');
    }

    // Metode untuk menampilkan halaman Editor
    public function edit1()
    {
        // Ambil data pertama dari tabel
        $data = ProfilInformasiDasar::first();
        // Kirim data ke view editor
        return view('app.editor.profilInformasiDasar', compact('data'));
    }

    // Metode untuk menyimpan data dari halaman Editor
    public function save1(Request $request)
    {
        $validatedData = $request->validate([
            'sejarah' => 'required|string',
            'visi' => 'required|string',
            'misi' => 'required|string',
            'struktur_organisasi' => 'required|string',
            'program_sekolah' => 'required|string',
        ]);

        ProfilInformasiDasar::updateOrCreate([], $validatedData);

        // Pengalihan kembali ke halaman editor setelah penyimpanan
        return redirect()->route('editor.profilInformasiDasar.edit')->with('success', 'Informasi profil berhasil disimpan.');
    }
}
