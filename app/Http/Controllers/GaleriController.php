<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class GaleriController extends Controller
{
    /**
     * Display a listing of the gallery items.
     *
     * @return View
     */
    public function index()
    {
        $galleries = Gallery::all();
        return view('app.admin.galeri', compact('galleries'));
    }

    /**
     * Store a newly created gallery item in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        // Validasi input
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string'
        ]);

        // Simpan file foto
        $fileName = time() . '.' . $request->photo->getClientOriginalExtension();
        $request->photo->move(public_path('galeri_img'), $fileName);

        // Simpan data ke database
        $galeri = Gallery::create([
            'photo' => $fileName,
            'description' => $request->description
        ]);

        // Catat log aktivitas menambahkan data galeri
        DB::table('log')->insert([
            'pesan' => "'" . Auth::user()->name . "' menambahkan data Galeri dengan deskripsi '" . $request->description . "'.",
            'created_at' => now(),
        ]);

        return $galeri
            ? redirect()->route('galeri')->with('success', 'Data galeri berhasil ditambahkan.')
            : redirect()->route('galeri')->with('error', 'Data galeri tidak berhasil ditambahkan.');
    }

    /**
     * Update the specified gallery item in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit(Request $request): RedirectResponse
    {
        $galeri = Gallery::find($request->galeri_id);

        if ($galeri) {
            // Jika ada file foto baru, hapus foto lama dan simpan yang baru
            if ($request->hasFile('photo')) {
                if (File::exists(public_path('galeri_img/' . $galeri->photo))) {
                    File::delete(public_path('galeri_img/' . $galeri->photo));
                }

                $fileName = time() . '.' . $request->photo->getClientOriginalExtension();
                $request->photo->move(public_path('galeri_img'), $fileName);
                $galeri->photo = $fileName;
            }

            $galeri->description = $request->description;
            $result = $galeri->save();

            // Catat log aktivitas mengubah data galeri
            DB::table('log')->insert([
                'pesan' => "'" . Auth::user()->name . "' mengubah data Galeri dengan deskripsi '" . $request->description . "'.",
                'created_at' => now(),
            ]);

            return $result
                ? redirect()->route('galeri')->with('success', 'Data galeri berhasil diubah.')
                : redirect()->route('galeri')->with('error', 'Gagal mengubah data galeri.');
        }

        return redirect()->route('galeri')->with('error', 'Data galeri tidak ditemukan.');
    }

    /**
     * Remove the specified gallery item from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Request $request): RedirectResponse
    {
        $galeri = Gallery::find($request->galeri_id);

        if ($galeri) {
            // Hapus file foto dari storage
            if (File::exists(public_path('galeri_img/' . $galeri->photo))) {
                File::delete(public_path('galeri_img/' . $galeri->photo));
            }

            $result = $galeri->delete();

            // Catat log aktivitas menghapus data galeri
            DB::table('log')->insert([
                'pesan' => "'" . Auth::user()->name . "' menghapus data Galeri dengan deskripsi '" . $galeri->description . "'.",
                'created_at' => now(),
            ]);

            return $result
                ? redirect()->route('galeri')->with('success', 'Data galeri berhasil dihapus.')
                : redirect()->route('galeri')->with('error', 'Gagal menghapus data galeri.');
        }

        return redirect()->route('galeri')->with('error', 'Data galeri tidak ditemukan.');
    }

    /**
     * Show gallery items to the home page.
     */
    public function showGallery()
    {
        $galleries = DB::table('galeri')->get(); // Ambil semua data dari tabel galeri
        return view('app.home', compact('galleries'));
    }
}
