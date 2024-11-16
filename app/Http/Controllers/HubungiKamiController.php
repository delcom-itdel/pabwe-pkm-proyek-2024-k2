<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HubungiKami;

class HubungiKamiController extends Controller
{
    // Menampilkan daftar data
    public function index()
    {
        $hubungiKamis = HubungiKami::all();
        return view('app.admin.hubungi.index', compact('hubungiKamis'));
    }

    // Menampilkan form untuk tambah data
    public function create()
    {
        return view('app.admin.hubungi.create');
    }

    // Menyimpan data baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        HubungiKami::create($validatedData);

        return redirect()->route('hubungi.index')->with('success', 'Data berhasil ditambahkan.');
    }

    // Menampilkan form edit data
    public function edit($id)
    {
        $hubungiKami = HubungiKami::findOrFail($id);
        return view('app.admin.hubungi.edit', compact('hubungiKami'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        $hubungiKami = HubungiKami::findOrFail($id);
        $hubungiKami->update($validatedData);

        return redirect()->route('hubungi.index')->with('success', 'Data berhasil diupdate.');
    }

    // Hapus data
    public function destroy($id)
    {
        $hubungiKami = HubungiKami::findOrFail($id);
        $hubungiKami->delete();

        return redirect()->route('hubungi.index')->with('success', 'Data berhasil dihapus.');
    }
}

