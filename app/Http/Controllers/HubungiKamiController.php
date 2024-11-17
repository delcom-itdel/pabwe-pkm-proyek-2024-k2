<?php

namespace App\Http\Controllers;

use App\Models\HubungiKami;
use Illuminate\Http\Request;

class HubungiKamiController extends Controller
{
    // Metode untuk menampilkan halaman Admin
    public function edit()
    {
        // Ambil data dari tabel
        $data = HubungiKami::first();

        // Simpan data ke session agar tetap ada meskipun halaman di-refresh
        session(['dataHubungiKami' => $data]);

        // Kirim data ke view admin
        return view('app.admin.hubungi', compact('data'));
    }

    // Metode untuk menyimpan data dari halaman Admin
    public function save(Request $request)
    {
        $validatedData = $request->validate([
            'info_hubungikami' => 'required|string',
            'updated_at',
        ]);

        HubungiKami::updateOrCreate([], $validatedData);

        session(['dataHubungiKami' => $validatedData]);

        // Pengalihan kembali ke halaman admin setelah penyimpanan
        return redirect()->route('admin.hubungiKami.edit')->with('success', 'Informasi Hubungi Kami berhasil disimpan.');
    }

    // Metode untuk menampilkan halaman Editor
    public function edit1()
    {
        // Ambil data pertama dari tabel
        $data = HubungiKami::first();

        // Simpan data ke session agar tetap ada meskipun halaman di-refresh
        session(['dataHubungiKami' => $data]);

        // Kirim data ke view editor
        return view('app.editor.informasiHubungiKami', compact('data'));
    }

    // Metode untuk menyimpan data dari halaman Editor
    public function save1(Request $request)
    {
        $validatedData = $request->validate([
            'info_hubungikami' => 'required|string',
            'updated_at',
        ]);

        // Simpan atau perbarui data ke database
        HubungiKami::updateOrCreate([], $validatedData);

        // Simpan data terbaru ke session
        session(['dataHubungiKami' => $validatedData]);

        // Pengalihan kembali ke halaman editor setelah penyimpanan
        return redirect()->route('editor.hubungiKami.edit')->with('success', 'Informasi Hubungi Kami berhasil disimpan.');
    }

    public function showInfoHubungiKami()
    {
        // Ambil data dari database
        $data = HubungiKami::first();

        // Kirim data ke view
        return view('app.hubungikami', [
            'info_hubungikami' => $data->info_hubungikami ?? 'Data belum tersedia.']);
    }

    public function showTime()
    {
        // Ambil data dari database
        $data = HubungiKami::first();

        // Kirim data ke view
        return view('app.updated_at', ['updated_at' => $data->updated_at ?? 'Data belum tersedia.']);
    }
}