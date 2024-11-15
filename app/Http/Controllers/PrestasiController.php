<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        return $prestasi
            ? redirect()->route('prestasi')->with('success', 'Data prestasi berhasil ditambahkan.')
            : redirect()->route('prestasi')->with('error', 'Data prestasi tidak berhasil ditambahkan.');
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
            // Periksa apakah ada file gambar baru yang diunggah
            if ($request->hasFile('cover')) {
                $fileName = time() . '.' . $request->cover->getClientOriginalExtension();
                $request->file('cover')->move(public_path('prestasi_img'), $fileName);
                $prestasi->cover = $fileName;
            }

            // Update field lainnya
            $prestasi->judul = $request->judul;
            $prestasi->tahun_perolehan = $request->tahun_perolehan;
            $prestasi->deskripsi = $request->deskripsi;

            // Simpan perubahan
            return $prestasi->save()
                ? redirect()->route('prestasi')->with('success', 'Data berhasil diubah.')
                : redirect()->route('prestasi')->with('error', 'Gagal mengubah data.');
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

        if ($prestasi && $prestasi->delete()) {
            return redirect()->route('prestasi')->with('success', 'Data berhasil dihapus.');
        }

        return redirect()->route('prestasi')->with('error', 'Gagal menghapus data.');
    }
}
