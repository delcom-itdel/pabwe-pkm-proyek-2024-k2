<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InformasiDasar;

class InformasiDasarController extends Controller
{
    /**
     * Fungsi untuk memperbarui atau menambahkan informasi dasar.
     */
    public function updateInformasiDasar(Request $request)
    {
        // Validasi data form
        $validated = $request->validate([
            'kontak_phone' => 'nullable|string|max:15',
            'kontak_email' => 'nullable|email|max:255',
            'nama_lokasi' => 'nullable|string|max:255',
            'alamat_lokasi' => 'nullable|string|max:255',
            'peta_lokasi' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'youtube' => 'nullable|string|max:255',
            'tiktok' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',
            'highlight' => 'nullable|string|max:255',
            'sub_highlight' => 'nullable|string|max:255',
            'cover' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048',  // Validasi untuk file cover
            'foto_kepala_sekolah' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi untuk foto kepala sekolah
            'judul_video' => 'nullable|string|max:255',
            'link_video' => 'nullable|url|max:255',
            'jumlah_peserta_didik' => 'nullable|integer|min:0',
            'jumlah_guru' => 'nullable|integer|min:0',
            'jumlah_kelas' => 'nullable|integer|min:0',
            'nama_kepala_sekolah' => 'nullable|string|max:255',
            'sambutan_kepala_sekolah' => 'nullable|string|max:1000',
        ]);

        InformasiDasar::updateOrCreate(['id' => 1], $validated);

        // Menyimpan file jika ada dan mendapatkan path-nya
        //$coverPath = null;
        //if ($request->hasFile('cover')) {
        //$coverPath = $request->file('cover')->store('covers', 'public');
        //}

        //$fotoKepalaSekolahPath = null;
        //if ($request->hasFile('foto_kepala_sekolah')) {
        //$fotoKepalaSekolahPath = $request->file('foto_kepala_sekolah')->store('foto_kepala_sekolah', 'public');
        //}

        // Redirect kembali ke halaman informasiDasar dengan pesan sukses
        return redirect()->back()->with('success', 'Data berhasil disimpan.');
    }
}
