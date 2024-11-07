<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilController;



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

// Route for the Informasi Dasar profil page
Route::get('/profilInformasiDasar', function () {
    return view('app/profilInformasiDasar');
})->name('profilInformasiDasar');

Route::get('/informasiPbdb', function () {
    return view('app/informasiPbdb');
})->name('informasiPbdb');

Route::get('/informasiArsip', function () {
    return view('app/informasiArsip');
})->name('informasiArsip');

Route::get('/informasiHubungiKami', function () {
    return view('app/informasiHubungiKami');
})->name('informasiHubungiKami');



Route::put('/informasi-dasar', [App\Http\Controllers\AdminController::class, 'updateInformasiDasar'])->name('updateInformasiDasar');

// Rute untuk halaman Sejarah dan Visi Misi
Route::get('/sejarah', [ProfilController::class, 'sejarah'])->name('sejarah');
Route::get('/visi-misi', [ProfilController::class, 'visiMisi'])->name('visiMisi');
Route::get('/struktur', [ProfilController::class, 'struktur'])->name('struktur');
Route::get('/program', [ProfilController::class, 'program'])->name('program');
Route::get('/staf', [ProfilController::class, 'staf'])->name('staf');
Route::get('/prestasi', [ProfilController::class, 'prestasi'])->name('prestasi');
Route::get('/alumni', [ProfilController::class, 'alumni'])->name('alumni');

// Rute untuk informasi
Route::get('/ppdb', [ProfilController::class, 'ppdb'])->name('ppdb');

//Rute untuk sarana prasarana
Route::get('/saranaPrasarana', [ProfilController::class, 'saranaPrasarana'])->name('saranaPrasarana');
