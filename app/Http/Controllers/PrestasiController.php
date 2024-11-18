<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PrestasiController extends Controller
{
    /**
     * Menampilkan semua data prestasi
     *
     * @return View
     */
    public function index(): View
    {
        $prestasi = Prestasi::all();
        return view('app.admin.prestasi', compact('prestasi'));
    }

    /**
     * Menyimpan data prestasi baru
     *
     * @param  Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        // Validasi input form
        $request->validate([
            'cover'           => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'judul'           => 'required|string|max:255',
            'tahun_perolehan' => 'required|integer|min:1900|max:' . date('Y'),
            'deskripsi'       => 'required|string'
        ]);

        // Upload gambar cover
        $fileName = time() . '.' . $request->cover->getClientOriginalExtension();
        $request->file('cover')->move(public_path('prestasi_img'), $fileName);

        // Membuat data prestasi baru
        $prestasi = Prestasi::create([
            'cover'           => $fileName,
            'judul'           => $request->judul,
            'tahun_perolehan' => $request->tahun_perolehan,
            'deskripsi'       => $request->deskripsi
        ]);

        // Simpan log aktivitas jika data berhasil disimpan
        if ($prestasi) {
            DB::table('log')->insert([
                'pesan' => "'" . Auth::user()->name . "' menambahkan data Prestasi '" . $request->judul . "' pada bagian Admin Prestasi.",
                'created_at' => date('Y-m-d H:i:s'),
            ]);

            return redirect()->route('prestasi')->with('success', 'Data prestasi berhasil ditambahkan.');
        }

        return redirect()->route('prestasi')->with('error', 'Data prestasi tidak berhasil ditambahkan.');
    }

    /**
     * Mengedit data prestasi yang ada
     *
     * @param  Request $request
     * @return RedirectResponse
     */
    public function edit(Request $request): RedirectResponse
    {
        $prestasi = Prestasi::find($request->prestasi_id);

        if ($prestasi) {
            if ($request->hasFile('cover')) {
                $fileName = time() . '.' . $request->cover->getClientOriginalExtension();
                $request->file('cover')->move(public_path('prestasi_img'), $fileName);
                $prestasi->cover = $fileName;
            }

            $prestasi->judul = $request->judul;
            $prestasi->tahun_perolehan = $request->tahun_perolehan;
            $prestasi->deskripsi = $request->deskripsi;

            // Simpan perubahan dan log aktivitas
            if ($prestasi->save()) {
                DB::table('log')->insert([
                    'pesan' => "'" . Auth::user()->name . "' mengubah data Prestasi '" . $request->judul . "' pada bagian Admin Prestasi.",
                    'created_at' => date('Y-m-d H:i:s'),
                ]);

                return redirect()->route('prestasi')->with('success', 'Data berhasil diubah.');
            }
            return redirect()->route('prestasi')->with('error', 'Gagal mengubah data.');
        }

        return redirect()->route('prestasi')->with('error', 'Data tidak ditemukan.');
    }

    /**
     * Menghapus data prestasi
     *
     * @param  Request $request
     * @return RedirectResponse
     */
    public function delete(Request $request): RedirectResponse
    {
        $prestasi = Prestasi::find($request->prestasi_id);

        if ($prestasi) {
            $judul = $prestasi->judul;
            if ($prestasi->delete()) {
                DB::table('log')->insert([
                    'pesan' => "'" . Auth::user()->name . "' menghapus data Prestasi '" . $judul . "' pada bagian Admin Prestasi.",
                    'created_at' => date('Y-m-d H:i:s'),
                ]);

                return redirect()->route('prestasi')->with('success', 'Data berhasil dihapus.');
            }
        }

        return redirect()->route('prestasi')->with('error', 'Gagal menghapus data.');
    }

    /**
     * Menampilkan semua data prestasi
     *
     * @return View
     */
    public function showPrestasi(): View
    {
        $prestasi = Prestasi::all();
        return view('app.admin.prestasi', compact('prestasi'));
    }
}
