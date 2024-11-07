<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EditorController;
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

// Admin page (protected route) - untuk Admin
Route::middleware(['auth', 'check.roles:Admin'])->group(function () {
    Route::get('/admin', function () {
        return view('app.admin.admin');
    })->name('admin');

    // Route untuk mengelola pengguna
    Route::get('/admin/users', [UserController::class, 'getUsersRoleAdmin'])->name('admin.users');
});

// Editor page (protected route) - untuk Editor
Route::middleware(['auth', 'check.roles:Editor'])->group(function () {
    Route::get('/editor', function () {
        return view('app.editor.editor');
    })->name('editor');
});

//accessible by Admin and Editor
Route::middleware(['auth', 'check.roles:Admin,Editor'])->group(function () {
    // Route for the Beranda Informasi Dasar page
    Route::get('/informasiDasar', function () {
        return view('app.informasiDasar');
    })->name('informasiDasar');

    Route::put('/informasi-dasar', [AdminController::class, 'updateInformasiDasar'])->name('updateInformasiDasar');

    // Route for the Profil Informasi Dasar page
    Route::get('/profilInformasiDasar', function () {
        return view('app.profilInformasiDasar');
    })->name('profilInformasiDasar');

    // Route for PPDB information page
    Route::get('/informasiPbdb', function () {
        return view('app.informasiPbdb');
    })->name('informasiPbdb');

    // Route for Arsip information page
    Route::get('/informasiArsip', function () {
        return view('app.informasiArsip');
    })->name('informasiArsip');

    // Route for Hubungi Kami information page
    Route::get('/informasiHubungiKami', function () {
        return view('app/informasiHubungiKami');
    })->name('informasiHubungiKami');

});

// Rute untuk halaman Profil
Route::get('/sejarah', [ProfilController::class, 'sejarah'])->name('sejarah');
Route::get('/visi-misi', [ProfilController::class, 'visiMisi'])->name('visiMisi');
Route::get('/struktur', [ProfilController::class, 'struktur'])->name('struktur');
Route::get('/program', [ProfilController::class, 'program'])->name('program');
Route::get('/staf', [ProfilController::class, 'staf'])->name('staf');
Route::get('/prestasi', [ProfilController::class, 'prestasi'])->name('prestasi');
Route::get('/alumni', [ProfilController::class, 'alumni'])->name('alumni');

// Rute untuk Informasi
Route::get('/ppdb', [ProfilController::class, 'ppdb'])->name('ppdb');

// Rute untuk Sarana Prasarana
Route::get('/saranaPrasarana', [ProfilController::class, 'saranaPrasarana'])->name('saranaPrasarana');

// Rute untuk Berita & Artikel
Route::get('/berita-artikel', [ProfilController::class, 'beritaArtikel'])->name('beritaArtikel');

// Rute untuk Galeri
Route::get('/galeri', [ProfilController::class, 'galeri'])->name('galeri');

// Rute untuk Arsip
Route::get('/arsip', [ProfilController::class, 'arsip'])->name('arsip');

// Rute untuk Hubungi Kami
Route::get('/hubungi-kami', [ProfilController::class, 'hubungiKami'])->name('hubungiKami');


//admin
Route::get('/staff', function () {
    return view('app/admin/staff');
})->name('staff');

Route::get('/prestasi', function () {
    return view('app/admin/prestasi');
})->name('prestasi');

Route::get('/alumni2', function () {
    return view('app/admin/alumni2');
})->name('alumni2');

Route::get('/sarana', function () {
    return view('app/admin/sarana');
})->name('sarana');

Route::get('/adminppdb', function () {
    return view('app/admin/adminppdb');
})->name('adminppdb');

Route::get('/berita', function () {
    return view('app/admin/berita');
})->name('berita');

Route::get('/galeri', function () {
    return view('app/admin/galeri');
})->name('galeri');

Route::get('/arsip', function () {
    return view('app/admin/arsip');
})->name('arsip');

Route::get('/hubungi', function () {
    return view('app/admin/hubungi');
})->name('hubungi');

Route::get('/informasi2', function () {
    return view('app/admin/informasi2');
})->name('informasi2');

Route::get('/informasi3', function () {
    return view('app/admin/informasi3');
})->name('informasi3');