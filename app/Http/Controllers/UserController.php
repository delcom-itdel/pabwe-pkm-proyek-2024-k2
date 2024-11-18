<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Mengambil data dengan pencarian
        $users = User::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('role', 'like', "%{$search}%");
        })->get();

        return view('app.admin.kelola', compact('users', 'search'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required|in:editor,admin',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $fileName = null;

        // Jika ada foto yang diunggah
        if ($request->hasFile('photo')) {
            $fileName = time() . '_' . uniqid() . '.' . $request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('user_photos'), $fileName);
        }

        // Simpan data pengguna ke database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hashing password
            'role' => $request->role,
            'photo' => $fileName,
        ]);

        // Catat log aktivitas penambahan pengguna
        DB::table('log')->insert([
            'pesan' => "'" . Auth::user()->name . "' menambahkan pengguna baru dengan nama '" . $request->name . "'.",
            'created_at' => now(),
        ]);

        return redirect()->route('kelola')->with('success', 'Pengguna berhasil ditambahkan.');
    }

    public function edit(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('kelola')->with('error', 'Pengguna tidak ditemukan.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required|in:editor,admin',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $fileName = time() . '_' . uniqid() . '.' . $request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('user_photos'), $fileName);

            // Hapus file lama jika ada
            if ($user->photo && file_exists(public_path('user_photos/' . $user->photo))) {
                unlink(public_path('user_photos/' . $user->photo));
            }

            $user->photo = $fileName;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->save();

        // Catat log aktivitas pembaruan pengguna
        DB::table('log')->insert([
            'pesan' => "'" . Auth::user()->name . "' memperbarui data pengguna dengan nama '" . $request->name . "'.",
            'created_at' => now(),
        ]);

        return redirect()->route('kelola')->with('success', 'Pengguna berhasil diubah.');
    }

    public function delete($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('kelola')->with('error', 'Pengguna tidak ditemukan.');
        }

        if ($user->photo && file_exists(public_path('user_photos/' . $user->photo))) {
            unlink(public_path('user_photos/' . $user->photo));
        }

        $userName = $user->name;
        $user->delete();

        // Catat log aktivitas penghapusan pengguna
        DB::table('log')->insert([
            'pesan' => "'" . Auth::user()->name . "' menghapus pengguna dengan nama '" . $userName . "'.",
            'created_at' => now(),
        ]);

        return redirect()->route('kelola')->with('success', 'Pengguna berhasil dihapus.');
    }
}
