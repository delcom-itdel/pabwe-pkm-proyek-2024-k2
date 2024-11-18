<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use Illuminate\Http\Request;

class ArsipController extends Controller
{
    // Metode untuk menampilkan halaman Admin
    public function edit()
    {
        // Ambil data dari tabel
        $data = Arsip::first();

        // Simpan data ke session agar tetap ada meskipun halaman di-refresh
        session(['dataArsip' => $data]);

        // Kirim data ke view admin
        return view('app.admin.arsip2', compact('data'));
    }

    // Metode untuk menyimpan data dari halaman Admin
    public function save(Request $request)
    {
        $validatedData = $request->validate([
            'info_arsip' => 'required|string',
            'updated_at',
        ]);

        Arsip::updateOrCreate([], $validatedData);

        session(['dataArsip' => $validatedData]);

        // Pengalihan kembali ke halaman admin setelah penyimpanan
        return redirect()->route('admin.informasiArsip.edit')->with('success', 'Informasi Arsip berhasil disimpan.');
    }

    // Metode untuk menampilkan halaman Editor
    public function edit1()
    {
        // Ambil data pertama dari tabel
        $data = Arsip::first();

        // Simpan data ke session agar tetap ada meskipun halaman di-refresh
        session(['dataArsip' => $data]);

        // Kirim data ke view editor
        return view('app.editor.informasiArsip', compact('data'));
    }

    // Metode untuk menyimpan data dari halaman Editor
    public function save1(Request $request)
    {
        $validatedData = $request->validate([
            'info_arsip' => 'required|string',
            'updated_at',
        ]);

        // Simpan atau perbarui data ke database
        Arsip::updateOrCreate([], $validatedData);

        // Simpan data terbaru ke session
        session(['dataArsip' => $validatedData]);

        // Pengalihan kembali ke halaman editor setelah penyimpanan
        return redirect()->route('editor.informasiArsip.edit')->with('success', 'Informasi Arsip berhasil disimpan.');
    }

    public function showInfoArsip()
    {
        // Ambil data dari database
        $data = Arsip::first();

        // Kirim data ke view
        return view('app.info_arsip', [
            'info_arsip' => $data->info_arsip ?? 'Data belum tersedia.']);
    }

    public function showTime()
    {
        // Ambil data dari database
        $data = Arsip::first();

        // Kirim data ke view
        return view('app.updated_at', ['updated_at' => $data->updated_at ?? 'Data belum tersedia.']);
    }
}