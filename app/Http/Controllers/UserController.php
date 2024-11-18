<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('app.admin.kelola', compact('users'));
    }

    public function store(Request $request)
{
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

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => $request->role,
        'photo' => $fileName,
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
            $fileName = time() . '.' . $request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('user_photos'), $fileName);
            $user->photo = $fileName;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;

        $user->save();

        return redirect()->route('kelola')->with('success', 'Pengguna berhasil diubah.');
    }
}