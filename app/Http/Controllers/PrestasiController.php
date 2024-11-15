<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    /**
     * Menampilkan semua data prestasi
     *
     * @return View
     */
    public function index(): View
    {
        // Ambil semua data prestasi dan simpan dalam array $data
        $data['prestasi'] = Prestasi::all();

        // Tampilkan view dengan data prestasi
        return view('app.admin.prestasi', ['data' => $data]);
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

        // Cek jika data prestasi berhasil disimpan
        if ($prestasi) {
            return redirect()->route('prestasi')->with('success', 'Data prestasi berhasil ditambahkan.');
        }

        // Redirect dengan pesan error jika gagal menambah data
        return redirect()->route('prestasi')->with('error', 'Data prestasi tidak berhasil ditambahkan.');
    }
}
