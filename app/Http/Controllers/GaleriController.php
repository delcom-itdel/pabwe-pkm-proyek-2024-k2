<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;


class GaleriController extends Controller
{
    /**
     * Display a listing of the gallery items.
     *
     * @return View
     */
    public function index(): View
    {
        $data['galeri'] = Gallery::all();
        return view('app.admin.galeri', ['data' => $data]);
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

            return $galeri->save()
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

            return $galeri->delete()
                ? redirect()->route('galeri')->with('success', 'Data galeri berhasil dihapus.')
                : redirect()->route('galeri')->with('error', 'Gagal menghapus data galeri.');
        }

        return redirect()->route('galeri')->with('error', 'Data galeri tidak ditemukan.');
    }
    public function showGallery()
    {
        $galleries = DB::table('galeri')->get(); // Ambil semua data dari tabel galeri
        return view('app.galeri', compact('galleries'));
    }
}
