<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\InformasiDasar;

class AdminController extends Controller
{
    public function updateInformasiDasar(Request $request)
    {
        // Validasi data form
        $request->validate([
            'kontak_phone' => 'required|string|max:15',
            'kontak_email' => 'required|email|max:255',
            'nama_lokasi' => 'required|string|max:255',
        ]);

        // Mengambil data terakhir dari tabel informasi_dasars
        $data = InformasiDasar::latest()->first();

        // Jika data ada, update, jika tidak buat baru
        if ($data) {
            $data->update([
                'kontak_phone' => $request->kontak_phone,
                'kontak_email' => $request->kontak_email,
                'nama_lokasi' => $request->nama_lokasi,
            ]);
        } else {
            InformasiDasar::create([
                'kontak_phone' => $request->kontak_phone,
                'kontak_email' => $request->kontak_email,
                'nama_lokasi' => $request->nama_lokasi,
            ]);
        }

        // Redirect kembali ke halaman informasiDasar dengan pesan sukses
        return redirect()->route('informasiDasar')
            ->with('success', 'Informasi Dasar berhasil diperbarui!')
            ->with('data', $request->only('kontak_phone', 'kontak_email', 'nama_lokasi'));
    }



}
