<?php

namespace App\Http\Controllers;

use App\Models\BeritaArtikel;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BeritaArtikelController extends Controller
{
    public function index(): View
    {
        $data['berita'] = BeritaArtikel::all();
        return view('app.admin.berita', ['data' => $data]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'cover' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'judul' => 'required|string|max:255',
            'tindakan' => 'nullable|string|max:255'
        ]);

        $fileName = time() . '.' . $request->cover->getClientOriginalExtension();
        $request->cover->move(public_path('berita_img'), $fileName);

        $berita = BeritaArtikel::create([
            'cover' => $fileName,
            'judul' => $request->judul,
            'tindakan' => $request->tindakan,
        ]);

        return $berita
            ? redirect()->route('berita')->with('success', 'Data berhasil ditambahkan.')
            : redirect()->route('berita')->with('error', 'Data tidak berhasil ditambahkan.');
    }

    public function edit(Request $request): RedirectResponse
    {
        $berita = BeritaArtikel::find($request->berita_id);

        if ($berita) {
            if ($request->hasFile('cover')) {
                if (File::exists(public_path('berita_img/' . $berita->cover))) {
                    File::delete(public_path('berita_img/' . $berita->cover));
                }

                $fileName = time() . '.' . $request->cover->getClientOriginalExtension();
                $request->cover->move(public_path('berita_img'), $fileName);
                $berita->cover = $fileName;
            }

            $berita->judul = $request->judul;
            $berita->tindakan = $request->tindakan;

            return $berita->save()
                ? redirect()->route('berita')->with('success', 'Data berhasil diubah.')
                : redirect()->route('berita')->with('error', 'Gagal mengubah data.');
        }

        return redirect()->route('berita')->with('error', 'Data tidak ditemukan.');
    }

    public function delete(Request $request): RedirectResponse
    {
        $berita = BeritaArtikel::find($request->berita_id);

        if ($berita) {
            if (File::exists(public_path('berita_img/' . $berita->cover))) {
                File::delete(public_path('berita_img/' . $berita->cover));
            }

            return $berita->delete()
                ? redirect()->route('berita')->with('success', 'Data berhasil dihapus.')
                : redirect()->route('berita')->with('error', 'Gagal menghapus data.');
        }

        return redirect()->route('berita')->with('error', 'Data tidak ditemukan.');
    }
}
