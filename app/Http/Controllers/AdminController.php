<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InformasiDasar;
use App\Models\Platform; // Import Platform model

class AdminController extends Controller
{
    // Method to update or create InformasiDasar
    public function updateInformasiDasar(Request $request)
    {
        // Validate form data
        $request->validate([
            'kontak_phone' => 'required|string|max:15',
            'kontak_email' => 'required|email|max:255',
            'nama_lokasi' => 'required|string|max:255',
        ]);

        // Fetch the latest data from informasi_dasars table
        $data = InformasiDasar::latest()->first();

        // If data exists, update; if not, create new record
        if ($data) {
            $data->update([
                'kontak_phone' => $request->kontak_phone,
                'kontak_email' => $request->kontak_email,
                'nama_lokasi' => $request->nama_lokasi,
            ]);
        } else {
            InformasiDasar::create([
                'kontak_phone' => $request->kontak_phone,
                'kontak_email' => $request->kontak_email,
                'nama_lokasi' => $request->nama_lokasi,
            ]);
        }

        // Redirect back to the informasiDasar route with success message
        return redirect()->route('informasiDasar')
            ->with('success', 'Informasi Dasar berhasil diperbarui!')
            ->with('data', $request->only('kontak_phone', 'kontak_email', 'nama_lokasi'));
    }

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
   
       return redirect()->back()->with('success', 'Platform berhasil diperbarui!');
   }
   
// Menghapus platform
public function destroy($id)
{
   $platform = Platform::findOrFail($id);
   $platform->delete();
   return redirect()->route('platform')->with('success', 'Platform berhasil dihapus.');
}

}