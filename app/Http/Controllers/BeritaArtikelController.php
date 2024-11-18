<?php

namespace App\Http\Controllers;

use App\Models\BeritaArtikel;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

        // Catat log aktivitas menambahkan berita
        DB::table('log')->insert([
            'pesan' => "'" . Auth::user()->name . "' menambahkan data Berita '" . $request->judul . "' pada bagian Berita.",
            'created_at' => now(),
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

            $result = $berita->save();

            // Catat log aktivitas mengedit berita
            DB::table('log')->insert([
                'pesan' => "'" . Auth::user()->name . "' mengubah data Berita '" . $request->judul . "' pada bagian Berita.",
                'created_at' => now(),
            ]);

            return $result
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

            $result = $berita->delete();

            // Catat log aktivitas menghapus berita
            DB::table('log')->insert([
                'pesan' => "'" . Auth::user()->name . "' menghapus data Berita '" . $berita->judul . "' pada bagian Berita.",
                'created_at' => now(),
            ]);

            return $result
                ? redirect()->route('berita')->with('success', 'Data berhasil dihapus.')
                : redirect()->route('berita')->with('error', 'Gagal menghapus data.');
        }

        return redirect()->route('berita')->with('error', 'Data tidak ditemukan.');
    }
}
