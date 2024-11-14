<?php

namespace App\Http\Controllers;

use App\Models\ProfilInformasiDasar;
use Illuminate\Http\Request;

class ProfilInformasiDasarController extends Controller
{
    public function showForm()
    {
        // Ambil data pertama dari tabel profil_informasi_dasars, jika tidak ada, buat objek kosong
        $data = ProfilInformasiDasar::firstOrNew(['id' => 1]);

        // Kirim data ke view form
        return view('profil_informasi_dasar_form', compact('data'));
    }

    public function saveData(Request $request)
    {
        // Validasi data dari request
        $validated = $request->validate([
            'sejarah' => 'nullable|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'struktur_organisasi' => 'nullable|string',
            'program_sekolah' => 'nullable|string',
        ]);

        // Simpan data, update jika sudah ada atau buat baru jika belum
        ProfilInformasiDasar::updateOrCreate(['id' => 1], $validated);

        // Kembali ke form dengan pesan sukses
        return redirect()->back()->with('success', 'Data berhasil disimpan.');
    }
}
