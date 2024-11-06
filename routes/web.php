<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;



//awal
Route::get('/', function () {
    return view('app/home');
})->name('home');

//tombol login
Route::get('/login', [LoginController::class, 'index'])->name('login');

// Handle login form submission
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

// Logout route
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Admin page (protected route)
Route::get('/admin', function () {
    return view('app/admin');
})->name('admin')->middleware('auth');

// Route for the Informasi Dasar page
Route::get('/informasiDasar', function () {
    return view('app/informasiDasar');
})->name('informasiDasar');