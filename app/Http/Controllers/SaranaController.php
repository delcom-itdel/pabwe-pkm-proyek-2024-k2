<?php

namespace App\Http\Controllers;

use App\Models\Sarana;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SaranaController extends Controller
{
    public function index(): View
    {
        $data['sarana'] = Sarana::all();
        return view('app.admin.sarana', ['data' => $data]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'cover' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string'
        ]);

        $fileName = time() . '.' . $request->cover->getClientOriginalExtension();
        $request->cover->move(public_path('sarana_img'), $fileName);

        $sarana = Sarana::create([
            'image' => $fileName,
            'name' => $request->nama,
            'description' => $request->deskripsi
        ]);

        return $sarana
            ? redirect()->route('sarana')->with('success', 'Data berhasil ditambahkan.')
            : redirect()->route('sarana')->with('error', 'Data tidak berhasil ditambahkan.');
    }

    public function edit(Request $request): RedirectResponse
    {
        $sarana = Sarana::find($request->sarana_id);

        if ($sarana) {
            if ($request->hasFile('cover')) {
                if (File::exists(public_path('sarana_img/' . $sarana->image))) {
                    File::delete(public_path('sarana_img/' . $sarana->image));
                }

                $fileName = time() . '.' . $request->cover->getClientOriginalExtension();
                $request->cover->move(public_path('sarana_img'), $fileName);
                $sarana->image = $fileName;
            }

            $sarana->name = $request->nama;
            $sarana->description = $request->deskripsi;

            return $sarana->save()
                ? redirect()->route('sarana')->with('success', 'Data berhasil diubah.')
                : redirect()->route('sarana')->with('error', 'Gagal mengubah data.');
        }

        return redirect()->route('sarana')->with('error', 'Data tidak ditemukan.');
    }

    public function delete(Request $request): RedirectResponse
    {
        $sarana = Sarana::find($request->sarana_id);

        if ($sarana) {
            if (File::exists(public_path('sarana_img/' . $sarana->image))) {
                File::delete(public_path('sarana_img/' . $sarana->image));
            }

            return $sarana->delete()
                ? redirect()->route('sarana')->with('success', 'Data berhasil dihapus.')
                : redirect()->route('sarana')->with('error', 'Gagal menghapus data.');
        }

        return redirect()->route('sarana')->with('error', 'Data tidak ditemukan.');
    }
}
