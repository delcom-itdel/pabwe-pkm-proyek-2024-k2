<?php

namespace App\Http\Controllers;

use App\Models\HubungiKami;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HubungiKamiController extends Controller
{
    /**
     * Menampilkan halaman Admin untuk mengedit informasi Hubungi Kami.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        // Ambil data dari tabel
        $data = HubungiKami::first();

        // Simpan data ke session agar tetap ada meskipun halaman di-refresh
        session(['dataHubungiKami' => $data]);

        // Kirim data ke view admin
        return view('app.admin.hubungi', compact('data'));
    }

    /**
     * Menyimpan data dari halaman Admin.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'info_hubungikami' => 'required|string',
        ]);

        // Simpan atau perbarui data ke database
        HubungiKami::updateOrCreate([], $validatedData);

        // Simpan data terbaru ke session
        session(['dataHubungiKami' => $validatedData]);

        // Catat log aktivitas
        DB::table('log')->insert([
            'pesan' => "'" . Auth::user()->name . "' menyimpan data Hubungi Kami dari halaman Admin.",
            'created_at' => now(),
        ]);

        // Pengalihan kembali ke halaman admin setelah penyimpanan
        return redirect()->route('admin.hubungiKami.edit')->with('success', 'Informasi Hubungi Kami berhasil disimpan.');
    }

    /**
     * Menampilkan halaman Editor untuk mengedit informasi Hubungi Kami.
     *
     * @return \Illuminate\View\View
     */
    public function edit1()
    {
        // Ambil data pertama dari tabel
        $data = HubungiKami::first();

        // Simpan data ke session agar tetap ada meskipun halaman di-refresh
        session(['dataHubungiKami' => $data]);

        // Kirim data ke view editor
        return view('app.editor.informasiHubungiKami', compact('data'));
    }

    /**
     * Menyimpan data dari halaman Editor.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save1(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'info_hubungikami' => 'required|string',
        ]);

        // Simpan atau perbarui data ke database
        HubungiKami::updateOrCreate([], $validatedData);

        // Simpan data terbaru ke session
        session(['dataHubungiKami' => $validatedData]);

        // Catat log aktivitas
        DB::table('log')->insert([
            'pesan' => "'" . Auth::user()->name . "' menyimpan data Hubungi Kami dari halaman Editor.",
            'created_at' => now(),
        ]);

        // Pengalihan kembali ke halaman editor setelah penyimpanan
        return redirect()->route('editor.hubungiKami.edit')->with('success', 'Informasi Hubungi Kami berhasil disimpan.');
    }

    /**
     * Menampilkan informasi Hubungi Kami di halaman pengguna umum.
     *
     * @return \Illuminate\View\View
     */
    public function showInfoHubungiKami()
    {
        // Ambil data dari database
        $data = HubungiKami::first();

        // Kirim data ke view
        return view('app.hubungikami', [
            'info_hubungikami' => $data->info_hubungikami ?? 'Data belum tersedia.'
        ]);
    }

    /**
     * Menampilkan waktu pembaruan terakhir dari informasi Hubungi Kami.
     *
     * @return \Illuminate\View\View
     */
    public function showTime()
    {
        // Ambil data dari database
        $data = HubungiKami::first();

        // Kirim data ke view
        return view('app.updated_at', ['updated_at' => $data->updated_at ?? 'Data belum tersedia.']);
    }
}
