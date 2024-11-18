<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Platform; // Import Platform model
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    // Method to store Platform data
    public function storePlatform(Request $request)
    {
        // Validate form data
        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url',
        ]);

        // Create new platform entry
        Platform::create([
            'name' => $request->name,
            'url' => $request->url,
        ]);

        DB::table('log')->insert([
            'pesan' => "'" . Auth::user()->name . "' " . 'menambahkan data Platform' . " '" . $request->name . "' " . 'pada bagian Admin Platform.',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Platform berhasil ditambahkan.');
    }

    public function index()
    {
        $platforms = Platform::all(); // Mengambil data platform lengkap
        return view('app.admin.platform', compact('platforms'));
    }

    public function update(Request $request, $id)
    {
        $platform = Platform::findOrFail($id);

        $platform->update([
            'name' => $request->name,
            'url' => $request->url,
        ]);

        DB::table('log')->insert([
            'pesan' => "'" . Auth::user()->name . "' " . 'mengubah data Platform' . " '" . $request->name . "' " . 'pada bagian Admin Platform.',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->back()->with('success', 'Platform berhasil diperbarui!');
    }

    // Menghapus platform
    public function destroy($id)
    {
        $platform = Platform::findOrFail($id);
        $platform->delete();

        DB::table('log')->insert([
            'pesan' => "'" . Auth::user()->name . "' " . 'menghapus data Platform' . " '" . $platform->name . "' " . 'pada bagian Admin Platform.',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        return redirect()->route('platform')->with('success', 'Platform berhasil dihapus.');
    }

    public function showHomePage()
    {
        $platforms = Platform::all();
        return view('app.home', compact('platforms'));
    }


}