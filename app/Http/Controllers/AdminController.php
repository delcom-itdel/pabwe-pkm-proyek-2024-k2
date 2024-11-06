<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminController extends Controller
{

  public function informasiDasar()
  {
    return view('app.informasiDasar'); // This will render the informasiDasar.blade.php view
  }
}
