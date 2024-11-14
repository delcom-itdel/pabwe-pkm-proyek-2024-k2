<?php

namespace App\Http\Controllers;

use App\Models\BeritaArtikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaArtikelController extends Controller
{
    // Menampilkan daftar berita/artikel
    public function index()
    {
        $beritaArtikels = BeritaArtikel::all();
        return view('app.admin.berita', compact('beritaArtikels'));
    }

    // Menampilkan form untuk membuat berita/artikel baru
    public function create()
    {
        return view('berita.create');
    }

    // Menyimpan berita/artikel baru
    public function store(Request $request)
    {
        // Validasi input form
        $request->validate([
            'judul' => 'required|string|max:255',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tindakan' => 'nullable|string|max:255',
        ]);

        // Menyimpan cover jika ada
        $path = $request->hasFile('cover') ? $request->file('cover')->store('cover_images', 'public') : null;

        // Menyimpan berita/artikel baru ke database
        BeritaArtikel::create([
            'judul' => $request->judul,
            'cover' => $path,
            'tindakan' => $request->tindakan,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Berita/Artikel berhasil dibuat.');
    }

    // Menampilkan detail berita/artikel
    public function show(BeritaArtikel $beritaArtikel)
    {
        return view('berita.show', compact('beritaArtikel'));
    }

    // Menampilkan form untuk mengedit berita/artikel
    public function edit(BeritaArtikel $beritaArtikel)
    {
        return view('berita.edit', compact('beritaArtikel'));
    }

    // Memperbarui berita/artikel
    public function update(Request $request, BeritaArtikel $beritaArtikel)
    {
        // Validasi input dari form
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tindakan' => 'nullable|string|max:255',
        ]);

        // Menyimpan cover baru jika ada, dan menghapus cover lama
        if ($request->hasFile('cover')) {
            // Hapus cover lama jika ada
            if ($beritaArtikel->cover && Storage::disk('public')->exists($beritaArtikel->cover)) {
                Storage::disk('public')->delete($beritaArtikel->cover);
            }

            // Simpan cover baru
            $validatedData['cover'] = $request->file('cover')->store('cover_images', 'public');
        }

        // Update data berita/artikel di database
        $beritaArtikel->update($validatedData);

        // Redirect dengan pesan sukses
        return redirect()->route('berita.index')->with('success', 'Berita/Artikel berhasil diperbarui.');
    }

    // Menghapus berita/artikel
    public function destroy(BeritaArtikel $beritaArtikel)
    {
        // Hapus file cover jika ada
        if ($beritaArtikel->cover && Storage::disk('public')->exists($beritaArtikel->cover)) {
            Storage::disk('public')->delete($beritaArtikel->cover);
        }

        // Hapus data berita/artikel dari database
        $beritaArtikel->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('berita.index')->with('success', 'Berita/Artikel berhasil dihapus.');
    }
}
