<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InformasiDasarController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\SaranaController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BeritaArtikelController;
use App\Http\Controllers\ProfilInformasiDasarController;

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

    // Route for Platform
    Route::get('/platform', function () {
        return view('app.admin.platform');
    })->name('platform');


    // Route for the Profil Informasi Dasar page
    Route::get('/profilInformasiDasar', function () {
        return view('app.editor.profilInformasiDasar');
    })->name('profilInformasiDasar');

    // Route for PPDB information page
    Route::get('/informasiPbdb', function () {
        return view('app.editor.informasiPbdb');
    })->name('informasiPbdb');

    // Route for Arsip information page
    Route::get('/informasiArsip', function () {
        return view('app.editor.informasiArsip');
    })->name('informasiArsip');

    // Route for Hubungi Kami information page
    Route::get('/informasiHubungiKami', function () {
        return view('app.editor.informasiHubungiKami');
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

// Rute untuk Prestasi
Route::get('/prestasi', [ProfilController::class, 'prestasi'])->name('prestasi');

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

Route::get('sarana', [SaranaController::class, 'index'])->name('sarana');

Route::post('add-sarana', [SaranaController::class, 'store'])->name('addsarana');

Route::post('edit-sarana', [SaranaController::class, 'edit'])->name('editsarana');
Route::post('delete-sarana', [SaranaController::class, 'delete'])->name('deletesarana');



Route::get('prestasi', [PrestasiController::class, 'index'])->name('prestasi'); // Menampilkan semua data prestasi

Route::post('prestasi', [PrestasiController::class, 'store'])->name('addprestasi'); // Menyimpan data prestasi baru

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

Route::get('/platform', function () {
    return view('app/admin/platform');
})->name('platform');

Route::get('/kelola', function () {
    return view('app/admin/kelola');
})->name('kelola');

Route::get('/log', function () {
    return view('app/admin/log');
})->name('log');


Route::get('/informasi3', function () {
    return view('app/admin/informasi3');
})->name('informasi3');

//editor
Route::get('/editor', function () {
    return view('app/editor/editor');
})->name('editor');

Route::get('/informasi-dasar', function () {
    return view('app/editor/informasiDasar');
})->name('informasiDasar');

//route profilinformasidasar

// Route untuk Admin
Route::get('/admin/profil-informasi-dasar', [ProfilInformasiDasarController::class, 'edit'])->name('profilInformasiDasar.edit');
Route::post('/admin/profil-informasi-dasar', [ProfilInformasiDasarController::class, 'save'])->name('profilInformasiDasarSave');

// Route untuk Editor
Route::get('/editor/profil-informasi-dasar', [ProfilInformasiDasarController::class, 'edit1'])->name('editor.profilInformasiDasar.edit');
Route::post('/editor/profil-informasi-dasar', [ProfilInformasiDasarController::class, 'save1'])->name('profilInformasiDasarSave1');


//route informasidasar
Route::post('/informasi-dasars', [InformasiDasarController::class, 'updateInformasiDasar'])->name('InformasiDasarSave');

//route platform
Route::get('/platform', [AdminController::class, 'index'])->name('platform');
Route::post('/platform/store', [AdminController::class, 'storePlatform'])->name('platforms.store');
Route::delete('/platform/destroy/{id}', [AdminController::class, 'destroy'])->name('platform.destroy');
Route::put('/platform/update/{id}', [AdminController::class, 'update'])->name('platform.update');

// Rute untuk halaman Berita & Artikel
Route::middleware(['auth', 'check.roles:Admin,Editor'])->group(function () {
    Route::get('/berita', [BeritaArtikelController::class, 'index'])->name('berita');
    Route::get('/berita/create', [BeritaArtikelController::class, 'create'])->name('berita.create');
    Route::post('/berita', [BeritaArtikelController::class, 'store'])->name('berita.store');
    Route::get('/berita/edit/{beritaArtikel}', [BeritaArtikelController::class, 'edit'])->name('berita.edit');
    Route::put('/berita/{beritaArtikel}', [BeritaArtikelController::class, 'update'])->name('berita.update');
    Route::delete('/berita/{beritaArtikel}', [BeritaArtikelController::class, 'destroy'])->name('berita.destroy');
    Route::get('/berita/{beritaArtikel}', [BeritaArtikelController::class, 'show'])->name('berita.show');
});
