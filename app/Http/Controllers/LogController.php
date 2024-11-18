<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LogController extends Controller
{
    public function index()
    {
        $data['logs'] = Log::all()->toArray();

        return view('app/admin/log', compact('data'));
    }
}
