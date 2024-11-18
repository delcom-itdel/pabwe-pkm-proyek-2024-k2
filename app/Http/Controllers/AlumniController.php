<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class AlumniController extends Controller
{
    public function index(): View
    {
        $data['alumni'] = Alumni::all();
        return view('app.admin.alumni2', ['data' => $data]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'name' => 'required|string|max:255',
            'tahun_lulus' => 'required|integer',
            'jurusan' => 'required|string|max:255',
            'testimoni' => 'nullable|string|max:1000',
        ]);

        $fileName = time() . '.' . $request->photo->getClientOriginalExtension();
        $request->photo->move(public_path('alumni_img'), $fileName);

        $alumni = Alumni::create([
            'photo' => $fileName,
            'name' => $request->name,
            'tahun_lulus' => $request->tahun_lulus,
            'jurusan' => $request->jurusan,
            'testimoni' => $request->testimoni,
        ]);

        // Catat log aktivitas menambahkan alumni
        DB::table('log')->insert([
            'pesan' => "'" . Auth::user()->name . "' menambahkan data Alumni '" . $request->name . "'.",
            'created_at' => now(),
        ]);

        return $alumni
            ? redirect()->route('alumni2')->with('success', 'Data berhasil ditambahkan.')
            : redirect()->route('alumni2')->with('error', 'Data tidak berhasil ditambahkan.');
    }

    public function edit(Request $request): RedirectResponse
    {
        $alumni = Alumni::find($request->alumni_id);

        if ($alumni) {
            if ($request->hasFile('photo')) {
                if (File::exists(public_path('alumni_img/' . $alumni->photo))) {
                    File::delete(public_path('alumni_img/' . $alumni->photo));
                }

                $fileName = time() . '.' . $request->photo->getClientOriginalExtension();
                $request->photo->move(public_path('alumni_img'), $fileName);
                $alumni->photo = $fileName;
            }

            $alumni->name = $request->name;
            $alumni->tahun_lulus = $request->tahun_lulus;
            $alumni->jurusan = $request->jurusan;
            $alumni->testimoni = $request->testimoni;

            $result = $alumni->save();

            // Catat log aktivitas mengedit alumni
            DB::table('log')->insert([
                'pesan' => "'" . Auth::user()->name . "' mengubah data Alumni '" . $request->name . "'.",
                'created_at' => now(),
            ]);

            return $result
                ? redirect()->route('alumni2')->with('success', 'Data berhasil diubah.')
                : redirect()->route('alumni2')->with('error', 'Gagal mengubah data.');
        }

        return redirect()->route('alumni2')->with('error', 'Data tidak ditemukan.');
    }

    public function delete(Request $request): RedirectResponse
    {
        $alumni = Alumni::find($request->alumni_id);

        if ($alumni) {
            if (File::exists(public_path('alumni_img/' . $alumni->photo))) {
                File::delete(public_path('alumni_img/' . $alumni->photo));
            }

            $result = $alumni->delete();

            // Catat log aktivitas menghapus alumni
            DB::table('log')->insert([
                'pesan' => "'" . Auth::user()->name . "' menghapus data Alumni '" . $alumni->name . "'.",
                'created_at' => now(),
            ]);

            return $result
                ? redirect()->route('alumni2')->with('success', 'Data berhasil dihapus.')
                : redirect()->route('alumni2')->with('error', 'Gagal menghapus data.');
        }

        return redirect()->route('alumni2')->with('error', 'Data tidak ditemukan.');
    }
    public function indexForUser()
    {
        // Logika untuk menampilkan daftar alumni
        return view('alumni.indexForUser');
    }
    

}