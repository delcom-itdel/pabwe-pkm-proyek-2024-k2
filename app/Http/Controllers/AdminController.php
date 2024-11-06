<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\InformasiDasar;

class AdminController extends Controller
{
  public function informasiDasar()
  {
    // Mengambil data terakhir dari tabel informasi_dasars
    $data = InformasiDasar::latest()->first();

    // Mengirim data ke view
    return view('app.informasiDasar', compact('data')); // This will render the informasiDasar.blade.php view
  }

  public function storeInformasiDasar(Request $request)
  {
    // Validasi data form
    $request->validate([
      'kontak_phone' => 'required|string|max:15',
      'kontak_email' => 'required|email|max:255',
      'nama_lokasi' => 'required|string|max:255',
    ]);

    // Menyimpan data ke database
    InformasiDasar::create([
      'kontak_phone' => $request->kontak_phone,
      'kontak_email' => $request->kontak_email,
      'nama_lokasi' => $request->nama_lokasi,
    ]);

    // Redirect kembali ke halaman informasiDasar dengan data yang disubmit
    return redirect()->route('informasiDasar')
      ->with('success', 'Informasi Dasar berhasil disimpan!')
      ->with('data', $request->only('kontak_phone', 'kontak_email', 'nama_lokasi'));
  }

}
