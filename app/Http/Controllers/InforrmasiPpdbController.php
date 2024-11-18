<?php

namespace App\Http\Controllers;

use App\Models\InformasiPpdb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InforrmasiPpdbController extends Controller
{
    // Metode untuk menampilkan halaman Admin
    public function edit()
    {
        // Ambil data dari tabel
        $data = InformasiPpdb::first();

        // Simpan data ke session agar tetap ada meskipun halaman di-refresh
        session(['dataPpdb' => $data]);

        // Kirim data ke view admin
        return view('app.admin.adminppdb', compact('data'));
    }

    // Metode untuk menyimpan data dari halaman Admin
    public function save(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'info_ppdb' => 'required|string',
        ]);

        // Simpan atau perbarui data di database
        InformasiPpdb::updateOrCreate([], $validatedData);

        // Simpan data terbaru ke session
        session(['dataPpdb' => $validatedData]);

        // Catat log aktivitas
        DB::table('log')->insert([
            'pesan' => "'" . Auth::user()->name . "' memperbarui informasi PPDB pada bagian Admin.",
            'created_at' => now(),
        ]);

        // Pengalihan kembali ke halaman admin setelah penyimpanan
        return redirect()->route('admin.informasiPpdb.edit')->with('success', 'Informasi PPDB berhasil disimpan.');
    }

    // Metode untuk menampilkan halaman Editor
    public function edit1()
    {
        // Ambil data pertama dari tabel
        $data = InformasiPpdb::first();

        // Simpan data ke session agar tetap ada meskipun halaman di-refresh
        session(['dataPpdb' => $data]);

        // Kirim data ke view editor
        return view('app.editor.informasiPpdb', compact('data'));
    }

    // Metode untuk menyimpan data dari halaman Editor
    public function save1(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'info_ppdb' => 'required|string',
        ]);

        // Simpan atau perbarui data ke database
        InformasiPpdb::updateOrCreate([], $validatedData);

        // Simpan data terbaru ke session
        session(['dataPpdb' => $validatedData]);

        // Catat log aktivitas
        DB::table('log')->insert([
            'pesan' => "'" . Auth::user()->name . "' memperbarui informasi PPDB pada bagian Editor.",
            'created_at' => now(),
        ]);

        // Pengalihan kembali ke halaman editor setelah penyimpanan
        return redirect()->route('editor.informasiPpdb.edit')->with('success', 'Informasi PPDB berhasil disimpan.');
    }

    public function showInfoPpdb()
    {
        // Ambil data dari database
        $data = InformasiPpdb::first();

        // Kirim data ke view
        return view('app.info_ppdb', [
            'info_ppdb' => $data->info_ppdb ?? 'Data belum tersedia.'
        ]);
    }

    public function showTime()
    {
        // Ambil data dari database
        $data = InformasiPpdb::first();

        // Kirim data ke view
        return view('app.updated_at', [
            'updated_at' => $data->updated_at ?? 'Data belum tersedia.'
        ]);
    }
}