<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InformasiDasar;

class InformasiDasarController extends Controller
{
    public function indexInformasiDasar()
    {
        $informasi = InformasiDasar::first();
        session(['informasiDasar' => $informasi]);
        return view('app.admin.informasi2', compact('informasi'));
    }

    public function updateInformasiDasar(Request $request)
    {
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
            'judul_video' => 'nullable|string|max:255',
            'link_video' => 'nullable|url|max:255',
            'jumlah_peserta_didik' => 'nullable|integer|min:0',
            'jumlah_guru' => 'nullable|integer|min:0',
            'jumlah_kelas' => 'nullable|integer|min:0',
            'nama_kepala_sekolah' => 'nullable|string|max:255',
            'sambutan_kepala_sekolah' => 'nullable|string|max:1000',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto_kepala_sekolah' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $informasi = InformasiDasar::first();

        // Memproses file 'cover' jika ada di request
        if ($request->hasFile('cover')) {
            // Menghapus cover lama jika ada
            if ($informasi && $informasi->cover && file_exists(public_path($informasi->cover))) {
                unlink(public_path($informasi->cover));
            }

            // Menyimpan file cover baru
            $fileNameCover = time() . '_cover.' . $request->cover->getClientOriginalExtension();
            $request->cover->move(public_path('img/cover_video'), $fileNameCover);
            $validated['cover'] = 'img/cover_video/' . $fileNameCover;
        }

        // Memproses file 'foto kepala sekolah' jika ada di request
        if ($request->hasFile('foto_kepala_sekolah')) {
            // Menghapus foto kepala sekolah lama jika ada
            if ($informasi && $informasi->foto_kepala_sekolah && file_exists(public_path($informasi->foto_kepala_sekolah))) {
                unlink(public_path($informasi->foto_kepala_sekolah));
            }

            // Menyimpan file foto kepala sekolah baru
            $fileNameFotoKepalaSekolah = time() . '_foto.' . $request->foto_kepala_sekolah->getClientOriginalExtension();
            $request->foto_kepala_sekolah->move(public_path('img/foto_kepsek'), $fileNameFotoKepalaSekolah);
            $validated['foto_kepala_sekolah'] = 'img/foto_kepsek/' . $fileNameFotoKepalaSekolah;
        }

        InformasiDasar::updateOrCreate([], $validated);
        session(['informasiDasar' => $validated]);
        return redirect()->route('admin.informasiDasar.index')->with('success', 'Informasi Dasar berhasil disimpan.');
    }

    public function indexInformasiDasar1()
    {
        $informasi = InformasiDasar::first();
        session(['informasiDasar' => $informasi]);
        return view('app.editor.informasiDasar', compact('informasi'));
    }

    public function updateInformasiDasar1(Request $request)
    {
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
            'judul_video' => 'nullable|string|max:255',
            'link_video' => 'nullable|url|max:255',
            'jumlah_peserta_didik' => 'nullable|integer|min:0',
            'jumlah_guru' => 'nullable|integer|min:0',
            'jumlah_kelas' => 'nullable|integer|min:0',
            'nama_kepala_sekolah' => 'nullable|string|max:255',
            'sambutan_kepala_sekolah' => 'nullable|string|max:1000',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto_kepala_sekolah' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $informasi = InformasiDasar::first();

        // Memproses file 'cover' jika ada di request
        if ($request->hasFile('cover')) {
            // Menghapus cover lama jika ada
            if ($informasi && $informasi->cover && file_exists(public_path($informasi->cover))) {
                unlink(public_path($informasi->cover));
            }

            // Menyimpan file cover baru
            $fileNameCover = time() . '_cover.' . $request->cover->getClientOriginalExtension();
            $request->cover->move(public_path('img/cover_video'), $fileNameCover);
            $validated['cover'] = 'img/cover_video/' . $fileNameCover;
        }

        // Memproses file 'foto kepala sekolah' jika ada di request
        if ($request->hasFile('foto_kepala_sekolah')) {
            // Menghapus foto kepala sekolah lama jika ada
            if ($informasi && $informasi->foto_kepala_sekolah && file_exists(public_path($informasi->foto_kepala_sekolah))) {
                unlink(public_path($informasi->foto_kepala_sekolah));
            }

            // Menyimpan file foto kepala sekolah baru
            $fileNameFotoKepalaSekolah = time() . '_foto.' . $request->foto_kepala_sekolah->getClientOriginalExtension();
            $request->foto_kepala_sekolah->move(public_path('img/foto_kepsek'), $fileNameFotoKepalaSekolah);
            $validated['foto_kepala_sekolah'] = 'img/foto_kepsek/' . $fileNameFotoKepalaSekolah;
        }


        InformasiDasar::updateOrCreate([], $validated);
        session(['informasiDasar' => $validated]);
        return redirect()->route('editor.informasiDasar.index')->with('success', 'Informasi Dasar berhasil disimpan.');
    }

    public function indexHome()
    {
        $informasi = InformasiDasar::first();

        return view('app.home', compact('informasi'));
    }
}
