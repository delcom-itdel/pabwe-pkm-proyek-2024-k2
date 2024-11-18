<?php

namespace App\Http\Controllers;

use App\Models\ProfilInformasiDasar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProfilInformasiDasarController extends Controller
{
    // Metode untuk menampilkan halaman Admin
    public function edit()
    {
        $data = ProfilInformasiDasar::first();
        session(['profilData' => $data]);
        return view('app.admin.informasi3', compact('data'));
    }

    // Metode untuk menyimpan data dari halaman Admin
    public function save(Request $request)
    {
        $validatedData = $request->validate([
            'sejarah' => 'required|string',
            'visi' => 'required|string',
            'misi' => 'required|string',
            'struktur_organisasi' => 'required|string',
            'program_sekolah' => 'required|string',
        ]);

        // Simpan atau perbarui data ke database
        ProfilInformasiDasar::updateOrCreate([], $validatedData);

        // Simpan log aktivitas
        DB::table('log')->insert([
            'pesan' => "'" . Auth::user()->name . "' menyimpan atau memperbarui data Profil Informasi Dasar pada bagian Admin.",
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        session(['profilData' => $validatedData]);
        return redirect()->route('admin.profilInformasiDasar.edit')->with('success', 'Informasi berhasil disimpan.');
    }

    // Metode untuk menampilkan halaman Editor
    public function edit1()
    {
        $data = ProfilInformasiDasar::first();
        session(['profilData' => $data]);
        return view('app.editor.profilInformasiDasar', compact('data'));
    }

    // Metode untuk menyimpan data dari halaman Editor
    public function save1(Request $request)
    {
        $validatedData = $request->validate([
            'sejarah' => 'required|string',
            'visi' => 'required|string',
            'misi' => 'required|string',
            'struktur_organisasi' => 'required|string',
            'program_sekolah' => 'required|string',
        ]);

        // Simpan atau perbarui data ke database
        ProfilInformasiDasar::updateOrCreate([], $validatedData);

        // Simpan log aktivitas
        DB::table('log')->insert([
            'pesan' => "'" . Auth::user()->name . "' menyimpan atau memperbarui data Profil Informasi Dasar pada bagian Editor.",
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        session(['profilData' => $validatedData]);
        return redirect()->route('editor.profilInformasiDasar.edit')->with('success', 'Informasi berhasil disimpan.');
    }

    public function showSejarah()
    {
        $data = ProfilInformasiDasar::first();
        return view('app.sejarah', ['sejarah' => $data->sejarah ?? 'Data belum tersedia.']);
    }

    public function showVisiMisi()
    {
        $data = ProfilInformasiDasar::first();
        return view('app.visi-misi', [
            'visi' => $data->visi ?? 'Belum ada data visi.',
            'misi' => $data->misi ?? 'Belum ada data misi.',
        ]);
    }

    public function showStruktur()
    {
        $data = ProfilInformasiDasar::first();
        return view('app.struktur', [
            'struktur_organisasi' => $data->struktur_organisasi ?? 'Belum ada data struktur organisasi.',
        ]);
    }

    public function showProgram()
    {
        $data = ProfilInformasiDasar::first();
        return view('app.program', [
            'program_sekolah' => $data->program_sekolah ?? 'Belum ada data program sekolah.',
        ]);
    }
}
