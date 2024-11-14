<?php

namespace App\Http\Controllers;

use App\Models\Sarana;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SaranaController extends Controller
{

    /**
     * create
     *
     * @return View
     */
    public function index(): View
    {
        // Get all sarana records and store it in $data array
        $data['sarana'] = Sarana::all();

        // Render view with data
        return view('app.admin.sarana', ['data' => $data]);
    }


    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate form input
        $request->validate([
            'cover'      => 'required',
            'nama'       => 'required',
            'deskripsi'  => 'required'
        ]);

        // Upload image
        $fileName = time() . '.' . $request->cover->getClientOriginalExtension();
        $request->file('cover')->move(public_path('sarana_img'), $fileName);

        // Create sarana entry
        $sarana = Sarana::create([
            'image'       => $fileName,
            'name'        => $request->nama,
            'description' => $request->deskripsi
        ]);

        // Check if the sarana entry was created successfully
        if ($sarana) {
            return redirect()->route('sarana')->with('success', 'Data berhasil ditambahkan.');
        }

        // Redirect with error message if creation failed
        return redirect()->route('sarana')->with('error', 'Data tidak berhasil ditambahkan.');
    }
}
