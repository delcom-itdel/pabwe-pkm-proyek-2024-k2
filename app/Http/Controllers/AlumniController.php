<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    // Menampilkan data alumni
    public function index()
    {
        $alumni = Alumni::all();
        return view('app.admin.alumni2', compact('alumni'));
    }

    // Menyimpan data alumni baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'photo' => 'required|image',
            'name' => 'required|string',
            'tahun_lulus' => 'required|integer',
            'jurusan' => 'required|string',
            'testimoni' => 'nullable|string',
        ]);

        // Proses menyimpan foto
        $path = $request->file('photo')->store('alumni_photos', 'public');

        // Membuat data alumni baru
        Alumni::create(array_merge($validated, ['photo' => $path]));

        return redirect()->back()->with('success', 'Data berhasil ditambahkan!');
    }

    // Menampilkan form edit alumni untuk modal
    public function edit($id)
    {
        $alumni = Alumni::findOrFail($id);
        return response()->json($alumni);  // Kirim data alumni ke modal dalam format JSON
    }

    // Memperbarui data alumni
    // public function update(Request $request, $id)
    // {
    //     $validated = $request->validate([
    //         'name' => 'required|string',
    //         'tahun_lulus' => 'required|integer',
    //         'jurusan' => 'required|string',
    //         'testimoni' => 'nullable|string',
    //         'photo' => 'nullable|image',  // Foto tidak wajib, hanya jika di-upload
    //     ]);

    //     // Mencari alumni berdasarkan ID yang diterima
    //     $alumni = Alumni::findOrFail($id);

    //     // Jika ada foto baru yang di-upload, simpan foto tersebut
    //     if ($request->hasFile('photo')) {
    //         $validated['photo'] = $request->file('photo')->store('alumni_photos', 'public');
    //     }

    //     // Update data alumni
    //     $alumni->update($validated);

    //     return redirect()->back()->with('success', 'Data berhasil diperbarui!');
    // }

public function update(Request $request)
{
    // Validasi input dari request
    $validated = $request->validate([
        'name' => 'required|string',
        'tahun_lulus' => 'required|integer',
        'jurusan' => 'required|string',
        'testimoni' => 'nullable|string',
        'photo' => 'nullable|image',
    ]);

    // Mencari alumni berdasarkan alumni_id yang dikirim dari form
    $alumni = Alumni::findOrFail($request->alumni_id);

    // Jika ada file foto baru yang diupload, simpan file tersebut
    if ($request->hasFile('photo')) {
        $validated['photo'] = $request->file('photo')->store('alumni_photos', 'public');
    }

    // Update data alumni
    $alumni->update($validated);

    // Redirect dengan pesan sukses
    return redirect()->back()->with('success', 'Data berhasil diperbarui!');
}



    // Menghapus data alumni
    public function destroy(Request $request)
    {
        $request->validate([
            'alumni_id' => 'required|exists:alumni,id',
        ]);

        $alumni = Alumni::findOrFail($request->alumni_id);
        $alumni->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }

    // Menampilkan semua data alumni untuk user
    public function indexForUser()
    {
        $alumni = Alumni::all();
        return view('app.alumni', compact('alumni'));
    }

    // Menampilkan detail alumni berdasarkan ID
    public function show($id)
    {
        $alumni = Alumni::findOrFail($id);  // Menggunakan findOrFail untuk memastikan data ditemukan
        return response()->json($alumni);  // Mengirimkan data alumni dalam format JSON
    }
}