<?php

namespace App\Http\Controllers;

use App\Models\ProfilInformasiDasar; // Model yang berhubungan dengan data profil dasar
use Illuminate\Http\Request;

class ProfilInformasiDasarController extends Controller
{
    public function edit()
    {
        $data = ProfilInformasiDasar::first(); // Mengambil data pertama

        return view('app.admin.informasi3', compact('data')); // Kirim data ke view
    }

    public function save(Request $request)
    {
        $validatedData = $request->validate([
            'sejarah' => 'required|string',
            'visi' => 'required|string',
            'misi' => 'required|string',
            'struktur_organisasi' => 'required|string',
            'program_sekolah' => 'required|string',
        ]);

        // Simpan atau update data
        ProfilInformasiDasar::updateOrCreate([], $validatedData);

        return redirect()->route('profilInformasiDasar.edit')->with('success', 'Informasi profil berhasil disimpan.');
    }
}
