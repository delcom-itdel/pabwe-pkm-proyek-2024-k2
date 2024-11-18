<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class StaffController extends Controller
{
    public function index(): View
    {
        $staff = Staff::all(); // Ambil data

        return view('app.admin.staff', compact('staff'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'name' => 'required|string|max:255',
            'group' => 'required|string',
            'position' => 'required|string|max:255'
        ]);

        $fileName = time() . '.' . $request->photo->getClientOriginalExtension();
        $request->photo->move(public_path('staff_img'), $fileName);

        $staff = Staff::create([
            'photo' => $fileName,
            'name' => $request->name,
            'group' => $request->group,
            'position' => $request->position
        ]);

        return $staff
            ? redirect()->route('staff')->with('success', 'Data staff berhasil ditambahkan.')
            : redirect()->route('staff')->with('error', 'Data staff tidak berhasil ditambahkan.');
    }


    public function edit(Request $request): RedirectResponse
    {
        $staff = Staff::find($request->staff_id);

        if ($staff) {
            if ($request->hasFile('photo')) {
                if (File::exists(public_path('staff_img/' . $staff->photo))) {
                    File::delete(public_path('staff_img/' . $staff->photo));
                }

                $fileName = time() . '.' . $request->photo->getClientOriginalExtension();
                $request->photo->move(public_path('staff_img'), $fileName);
                $staff->photo = $fileName;
            }

            $staff->name = $request->name;
            $staff->group = $request->group;
            $staff->position = $request->position;

            return $staff->save()
                ? redirect()->route('staff')->with('success', 'Data staff berhasil diubah.')
                : redirect()->route('staff')->with('error', 'Gagal mengubah data staff.');
        }

        return redirect()->route('staff')->with('error', 'Data staff tidak ditemukan.');
    }

    public function delete(Request $request): RedirectResponse
    {
        $staff = Staff::find($request->staff_id);

        if ($staff) {
            if (File::exists(public_path('staff_img/' . $staff->photo))) {
                File::delete(public_path('staff_img/' . $staff->photo));
            }

            return $staff->delete()
                ? redirect()->route('staff')->with('success', 'Data staff berhasil dihapus.')
                : redirect()->route('staff')->with('error', 'Gagal menghapus data staff.');
        }

        return redirect()->route('staff')->with('error', 'Data staff tidak ditemukan.');
    }
}
