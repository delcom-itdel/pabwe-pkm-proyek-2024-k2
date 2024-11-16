<?php
namespace App\Http\Controllers;

use App\Models\ProfilInformasiDasar;
use Illuminate\Http\Request;

class ProfilInformasiDasarController extends Controller
{
    // Metode untuk menampilkan halaman Admin
    public function edit()
    {
        // Ambil data dari database
        $data = ProfilInformasiDasar::first();

        // Simpan data ke session agar tetap ada meskipun halaman di-refresh
        session(['profilData' => $data]);

        return view('app.admin.informasi3', compact('data'));
    }

    // Metode untuk menyimpan data dari halaman Admin
    public function save(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'sejarah' => 'required|string',
            'visi' => 'required|string',
            'misi' => 'required|string',
            'struktur_organisasi' => 'required|string',
            'program_sekolah' => 'required|string',
        ]);

        // Simpan atau perbarui data ke database
        ProfilInformasiDasar::updateOrCreate([], $validatedData);

        // Simpan data terbaru ke session
        session(['profilData' => $validatedData]);

        return redirect()->route('admin.profilInformasiDasar.edit')->with('success', 'Informasi berhasil disimpan.');
    }

    // Metode untuk menampilkan halaman Editor
    public function edit1()
    {
        // Ambil data dari database
        $data = ProfilInformasiDasar::first();

        // Simpan data ke session agar tetap ada meskipun halaman di-refresh
        session(['profilData' => $data]);

        return view('app.editor.profilInformasiDasar', compact('data'));
    }

    // Metode untuk menyimpan data dari halaman Editor
    public function save1(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'sejarah' => 'required|string',
            'visi' => 'required|string',
            'misi' => 'required|string',
            'struktur_organisasi' => 'required|string',
            'program_sekolah' => 'required|string',
        ]);

        // Simpan atau perbarui data ke database
        ProfilInformasiDasar::updateOrCreate([], $validatedData);

        // Simpan data terbaru ke session
        session(['profilData' => $validatedData]);

        return redirect()->route('editor.profilInformasiDasar.edit')->with('success', 'Informasi berhasil disimpan.');
    }

    public function showSejarah()
    {
        // Ambil data dari database
        $data = ProfilInformasiDasar::first();

        // Kirim data ke view sejarah.blade.php
        return view('app.sejarah', ['sejarah' => $data->sejarah ?? 'Data belum tersedia.']);
    }

    public function showVisiMisi()
    {
        // Ambil data dari tabel
        $data = ProfilInformasiDasar::first();

        // Kirim data ke view
        return view('app.visi-misi', [
            'visi' => $data->visi ?? 'Belum ada data visi.',
            'misi' => $data->misi ?? 'Belum ada data misi.',
        ]);
    }

    public function showStrukturOrganisasi()
    {
        // Ambil data dari tabel
        $data = ProfilInformasiDasar::first();

        // Kirim data ke view
        return view('app.struktur', [
            'struktur' => $data->struktur_organisasi ?? 'Belum ada data struktur organisasi.',
        ]);
    }
}
