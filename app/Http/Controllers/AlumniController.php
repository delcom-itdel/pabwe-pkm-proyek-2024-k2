<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AlumniController extends Controller
{
    /**
     * Menampilkan data alumni
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $alumni = Alumni::all();
        return view('app.admin.alumni2', compact('alumni'));
    }

    /**
     * Menyimpan data alumni baru
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
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
        $alumni = Alumni::create(array_merge($validated, ['photo' => $path]));

        // Catat log aktivitas menambahkan data alumni
        DB::table('log')->insert([
            'pesan' => "'" . Auth::user()->name . "' menambahkan data Alumni dengan nama '" . $request->name . "'.",
            'created_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Menampilkan form edit alumni untuk modal
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        $alumni = Alumni::findOrFail($id);
        return response()->json($alumni); // Kirim data alumni ke modal dalam format JSON
    }

    /**
     * Memperbarui data alumni
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'tahun_lulus' => 'required|integer',
            'jurusan' => 'required|string',
            'testimoni' => 'nullable|string',
            'photo' => 'nullable|image', // Foto tidak wajib, hanya jika di-upload
        ]);

        // Mencari alumni berdasarkan ID yang diterima
        $alumni = Alumni::findOrFail($id);

        // Jika ada foto baru yang di-upload, simpan foto tersebut
        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($alumni->photo && Storage::disk('public')->exists($alumni->photo)) {
                Storage::disk('public')->delete($alumni->photo);
            }

            // Simpan foto baru
            $validated['photo'] = $request->file('photo')->store('alumni_photos', 'public');
        }

        // Update data alumni
        $alumni->update($validated);

        // Catat log aktivitas pembaruan data alumni
        DB::table('log')->insert([
            'pesan' => "'" . Auth::user()->name . "' memperbarui data Alumni dengan nama '" . $request->name . "'.",
            'created_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Data berhasil diperbarui!');
    }

    /**
     * Menghapus data alumni
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $request->validate([
            'alumni_id' => 'required|exists:alumni,id',
        ]);

        $alumni = Alumni::findOrFail($request->alumni_id);

        // Hapus foto dari penyimpanan jika ada
        if ($alumni->photo && Storage::disk('public')->exists($alumni->photo)) {
            Storage::disk('public')->delete($alumni->photo);
        }

        $alumniName = $alumni->name;
        $alumni->delete();

        // Catat log aktivitas penghapusan data alumni
        DB::table('log')->insert([
            'pesan' => "'" . Auth::user()->name . "' menghapus data Alumni dengan nama '" . $alumniName . "'.",
            'created_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }

    /**
     * Menampilkan semua data alumni untuk user
     *
     * @return \Illuminate\View\View
     */
    public function indexForUser()
    {
        $alumni = Alumni::all();
        return view('app.alumni', compact('alumni'));
    }

    /**
     * Menampilkan detail alumni berdasarkan ID
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $alumni = Alumni::findOrFail($id); // Menggunakan findOrFail untuk memastikan data ditemukan
        return response()->json($alumni); // Mengirimkan data alumni dalam format JSON
    }
}
