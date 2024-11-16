<?php

namespace App\Http\Controllers;

use App\Models\InformasiPpdb;
use Illuminate\Http\Request;

class InforrmasiPpdbController extends Controller
{
    public function edit(){
        // Ambil data pertama dari tabel
        $data = InformasiPpdb::first();
        // Kirim data ke view admin
        return view('app.admin.adminppdb', compact('data'));
    }

    // Metode untuk menyimpan data dari halaman Admin
    public function save(Request $request)
    {
        $validatedData = $request->validate([
            'info_ppdb' => 'required|string',
        ]);

        InformasiPpdb::updateOrCreate([], $validatedData);

        // Pengalihan kembali ke halaman admin setelah penyimpanan
        return redirect()->route('informasiPpdb.edit')->with('success', 'Informasi ppdb berhasil disimpan.');
    }

    // Metode untuk menampilkan halaman Editor
    public function edit1()
    {
        // Ambil data pertama dari tabel
        $data = InformasiPpdb::first();
        // Kirim data ke view editor
        return view('app.editor.informasiPpdb', compact('data'));
    }

    // Metode untuk menyimpan data dari halaman Editor
    public function save1(Request $request)
    {
        $validatedData = $request->validate([
            'info_ppdb' => 'required|string',
        ]);

        InformasiPpdb::updateOrCreate([], $validatedData);

        // Pengalihan kembali ke halaman editor setelah penyimpanan
        return redirect()->route('editor.informasiPpdb.edit')->with('success', 'Informasi ppdb berhasil disimpan.');
    }
}
