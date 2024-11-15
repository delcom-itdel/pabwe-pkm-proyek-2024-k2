<?php

namespace App\Http\Controllers;

use App\Models\Sarana;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function edit(Request $request)
    {
        $item = DB::table('sarana')->where('id', $request->sarana_id)->first();

        if ($item) {
            if ($request->hasFile('cover')) {
                $filename = time() . '.' . $request->cover->getClientOriginalExtension();
                $request->file('')->move(public_path('sarana_img'), $filename);

                $update = DB::table('sarana')->where('id', $request->sarana_id)->update([
                    'image' => $filename,
                    'name' => $request->nama,
                    'description' => $request->deskripsi
                ]);
            } else {
                $update = DB::table('sarana')->where('id', $request->sarana_id)->update([
                    'name' => $request->nama,
                    'description' => $request->deskripsi
                ]);
            }

            if ($update) {
                return redirect(url('sarana'))->with('success', 'Berhasil mengubah data.');
            }

            return redirect(url('sarana'))->with('error', 'Gagal mengubah data.');
        }
    }

    public function delete(Request $request)
    {
        
        $item = DB::table('sarana')->where('id', $request->sarana_id)->first();

        if ($item) {
            $delete = DB::table('sarana')->where('id',  $request->sarana_id)->delete();


            if ($delete) {
                return redirect(url('sarana'))->with('success', 'Berhasil mengahpus data.');
            }

            return redirect(url('sarana'))->with('error', 'Gagal menghapus data.');
        }
    }
}
