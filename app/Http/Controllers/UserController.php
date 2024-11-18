<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // Ambil keyword dari input pencarian
        $search = $request->input('search');

        // Query untuk mendapatkan data dengan pencarian
        $users = User::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('role', 'like', "%{$search}%");
        })->get();

        return view('app.admin.kelola', compact('users', 'search'));
    }

    public function store(Request $request)
    {
        \Log::info('Masuk ke metode store', $request->all());

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required|in:editor,admin',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $fileName = null;
        if ($request->hasFile('photo')) {
            $fileName = time() . '.' . $request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('user_photos'), $fileName);
        }

        \Log::info('File uploaded: ' . $fileName);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'photo' => $fileName,
        ]);

        \Log::info('User berhasil dibuat');
        return redirect()->route('kelola')->with('success', 'Pengguna berhasil ditambahkan.');
    }

    public function edit(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            \Log::error("Pengguna dengan ID $id tidak ditemukan");
            return redirect()->route('kelola')->with('error', 'Pengguna tidak ditemukan.');
        }

        \Log::info("Pengguna ditemukan: ", $user->toArray());

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required|in:editor,admin',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $fileName = time() . '.' . $request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('user_photos'), $fileName);
            $user->photo = $fileName;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->save();

        \Log::info("Pengguna berhasil diperbarui: ", $user->toArray());

        return redirect()->route('kelola')->with('success', 'Pengguna berhasil diubah.');
    }


    public function delete($id)
    {
        $user = User::find($id);

        if (!$user) {
            \Log::error("Pengguna dengan ID $id tidak ditemukan");
            return redirect()->route('kelola')->with('error', 'Pengguna tidak ditemukan.');
        }

        if ($user->photo && file_exists(public_path('user_photos/' . $user->photo))) {
            unlink(public_path('user_photos/' . $user->photo));
        }

        $user->delete();

        \Log::info("Pengguna dengan ID $id berhasil dihapus");

        return redirect()->route('kelola')->with('success', 'Pengguna berhasil dihapus.');
    }

}