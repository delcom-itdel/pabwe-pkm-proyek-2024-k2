<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ArsipController extends Controller
{
    /**
     * Menampilkan halaman Admin untuk mengedit arsip.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        // Ambil data dari tabel
        $data = Arsip::first();

        // Simpan data ke session agar tetap ada meskipun halaman di-refresh
        session(['dataArsip' => $data]);

        // Kirim data ke view admin
        return view('app.admin.arsip2', compact('data'));
    }

    /**
     * Menyimpan data dari halaman Admin.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(Request $request)
    {
        $validatedData = $request->validate([
            'info_arsip' => 'required|string',
            'updated_at',
        ]);

        // Simpan atau perbarui data ke database
        Arsip::updateOrCreate([], $validatedData);

        // Simpan data terbaru ke session
        session(['dataArsip' => $validatedData]);

        // Catat log aktivitas
        DB::table('log')->insert([
            'pesan' => "'" . Auth::user()->name . "' menyimpan data Arsip dari halaman Admin.",
            'created_at' => now(),
        ]);

        // Pengalihan kembali ke halaman admin setelah penyimpanan
        return redirect()->route('admin.informasiArsip.edit')->with('success', 'Informasi Arsip berhasil disimpan.');
    }

    /**
     * Menampilkan halaman Editor untuk mengedit arsip.
     *
     * @return \Illuminate\View\View
     */
    public function edit1()
    {
        // Ambil data pertama dari tabel
        $data = Arsip::first();

        // Simpan data ke session agar tetap ada meskipun halaman di-refresh
        session(['dataArsip' => $data]);

        // Kirim data ke view editor
        return view('app.editor.informasiArsip', compact('data'));
    }

    /**
     * Menyimpan data dari halaman Editor.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
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

        // Catat log aktivitas
        DB::table('log')->insert([
            'pesan' => "'" . Auth::user()->name . "' menyimpan data Arsip dari halaman Editor.",
            'created_at' => now(),
        ]);

        // Pengalihan kembali ke halaman editor setelah penyimpanan
        return redirect()->route('editor.informasiArsip.edit')->with('success', 'Informasi Arsip berhasil disimpan.');
    }

    /**
     * Menampilkan informasi Arsip di halaman untuk pengguna umum.
     *
     * @return \Illuminate\View\View
     */
    public function showInfoArsip()
    {
        // Ambil data dari database
        $data = Arsip::first();

        // Kirim data ke view
        return view('app.info_arsip', [
            'info_arsip' => $data->info_arsip ?? 'Data belum tersedia.'
        ]);
    }

    /**
     * Menampilkan waktu pembaruan terakhir data Arsip.
     *
     * @return \Illuminate\View\View
     */
    public function showTime()
    {
        // Ambil data dari database
        $data = Arsip::first();

        // Kirim data ke view
        return view('app.updated_at', ['updated_at' => $data->updated_at ?? 'Data belum tersedia.']);
    }
}
