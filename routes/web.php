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
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\InforrmasiPpdbController;
use App\Http\Controllers\HubungiKamiController;
use App\Http\Controllers\ArsipController;
use App\Http\Controllers\AlumniController;

use App\Http\Controllers\LogController;

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
    Route::get('/informasiPpdb', function () {
        return view('app.editor.informasiPpdb');
    })->name('informasiPpdb');

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
Route::get('/prestasi1', [ProfilController::class, 'prestasi1'])->name('prestasi1');
Route::get('/alumni', [ProfilController::class, 'alumni'])->name('alumni');

// Rute untuk Informasi
Route::get('/ppdb', [ProfilController::class, 'ppdb'])->name('ppdb');

// Rute untuk Sarana Prasarana
Route::get('/saranaPrasarana', [ProfilController::class, 'saranaPrasarana'])->name('saranaPrasarana');

// Rute untuk Prestasi


// Rute untuk Berita & Artikel
Route::get('/berita-artikel', [ProfilController::class, 'beritaArtikel'])->name('beritaArtikel');

// Rute untuk Galeri
Route::get('/galeri1', [ProfilController::class, 'galeri1'])->name('galeri1');

// Rute untuk Arsip
Route::get('/arsip1', [ProfilController::class, 'arsip1'])->name('arsip1');

// Rute untuk Hubungi Kami
Route::get('/hubungi-kami', [ProfilController::class, 'hubungiKami'])->name('hubungiKami');


//admin
Route::get('/staff', function () {
    return view('app/admin/staff');
})->name('staff');

Route::get('/admin/prestasi', function () {
    return view('app/admin/prestasi');
})->name('prestasi');

Route::get('/alumni2', function () {
    return view('app/admin/alumni2');
})->name('alumni2');

// Rute untuk Alumni
// Rute untuk melihat daftar alumni bagi admin
Route::get('/alumni2', [AlumniController::class, 'index'])->name('alumni2');  // Admin route
Route::post('/alumni2', [AlumniController::class, 'store'])->name('addalumni');
Route::put('/alumni2', [AlumniController::class, 'edit'])->name('editalumni');
Route::delete('/alumni2', [AlumniController::class, 'delete'])->name('deletealumni');

// Rute untuk melihat daftar alumni bagi user (this route is separate for user view)
Route::get('/alumni-user', [AlumniController::class, 'indexForUser'])->name('alumni.user');






Route::get('sarana', [SaranaController::class, 'index'])->name('sarana');
Route::post('add-sarana', [SaranaController::class, 'store'])->name('addsarana');
Route::post('edit-sarana', [SaranaController::class, 'edit'])->name('editsarana');
Route::delete('delete-sarana', [SaranaController::class, 'delete'])->name('deletesarana');


//Prestasi
Route::get('prestasi', [PrestasiController::class, 'index'])->name('prestasi');
Route::post('prestasi', [PrestasiController::class, 'store'])->name('addprestasi');
Route::post('edit-prestasi', [PrestasiController::class, 'edit'])->name('editprestasi');
Route::post('delete-prestasi', [PrestasiController::class, 'delete'])->name('deleteprestasi');

Route::get('/adminppdb', function () {
    return view('app/admin/adminppdb');
})->name(name: 'adminppdb');

Route::get('/berita', function () {
    return view('app/admin/berita');
})->name('berita');

Route::get('/galeri', function () {
    return view('app/admin/galeri');
})->name('galeri');


Route::get('/arsip2', function () {
    return view('app/admin/arsip2');
})->name('arsip2');

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

Route::get('/log', [LogController::class, 'index'])->name('log');


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
Route::prefix('admin')->group(function () {
    Route::get('/profil-informasi-dasar', [ProfilInformasiDasarController::class, 'edit'])->name('admin.profilInformasiDasar.edit');
    Route::post('/profil-informasi-dasar', [ProfilInformasiDasarController::class, 'save'])->name('admin.profilInformasiDasar.save');
});

// Route untuk Editor
Route::prefix('editor')->group(function () {
    Route::get('/profil-informasi-dasar', [ProfilInformasiDasarController::class, 'edit1'])->name('editor.profilInformasiDasar.edit');
    Route::post('/profil-informasi-dasar', [ProfilInformasiDasarController::class, 'save1'])->name('editor.profilInformasiDasar.save');
});

//route informasidasar
//admin
Route::prefix('admin')->group(function () {
    Route::get('/informasi-dasars', [InformasiDasarController::class, 'indexInformasiDasar'])->name('admin.informasiDasar.index');
    Route::post('/informasi-dasars', [InformasiDasarController::class, 'updateInformasiDasar'])->name('admin.informasiDasar.update');
});
//editor
Route::prefix('editor')->group(function () {
    Route::get('/informasi-dasars', [InformasiDasarController::class, 'indexInformasiDasar1'])->name('editor.informasiDasar.index');
    Route::post('/informasi-dasars', [InformasiDasarController::class, 'updateInformasiDasar1'])->name('editor.informasiDasar.update');
});
Route::get('/home', [InformasiDasarController::class, 'indexHome']);

//route platform
Route::get('/platform', [AdminController::class, 'index'])->name('platform');
Route::post('/platform/store', [AdminController::class, 'storePlatform'])->name('platforms.store');
Route::delete('/platform/destroy/{id}', [AdminController::class, 'destroy'])->name('platform.destroy');
Route::put('/platform/update/{id}', [AdminController::class, 'update'])->name('platform.update');
Route::get('/', [AdminController::class, 'showHomePage'])->name('home');

// Rute untuk halaman Berita & Artikel

Route::get('berita', [BeritaArtikelController::class, 'index'])->name('berita');
Route::post('add-berita', [BeritaArtikelController::class, 'store'])->name('addberita');
Route::post('edit-berita', [BeritaArtikelController::class, 'edit'])->name('editberita');
Route::delete('delete-berita', [BeritaArtikelController::class, 'delete'])->name('deleteberita');


//rute untuk halaman galeri 
Route::prefix('galeri')->group(function () {
    // Route untuk menampilkan halaman galeri
    Route::get('/', [GaleriController::class, 'index'])->name('galeri');

    // Route untuk menambahkan data galeri
    Route::post('/store', [GaleriController::class, 'store'])->name('addgaleri');

    // Route untuk mengedit data galeri
    Route::post('/edit', [GaleriController::class, 'edit'])->name('editgaleri');

    // Route untuk menghapus data galeri
    Route::delete('/delete', [GaleriController::class, 'delete'])->name('deletegaleri');
});




Route::get('staff', [StaffController::class, 'index'])->name('staff');
Route::post('add-staff', [StaffController::class, 'store'])->name('addstaff');
Route::post('edit-staff', [StaffController::class, 'edit'])->name('editstaff');
Route::delete('delete-staff', [StaffController::class, 'delete'])->name('deletestaff');


//route informasi ppdb
// Route untuk Admin
Route::prefix('admin')->group(function () {
    Route::get('/admin/informasi-ppdb', [InforrmasiPpdbController::class, 'edit'])->name('admin.informasiPpdb.edit');
    Route::post('/admin/informasi-ppdb', [InforrmasiPpdbController::class, 'save'])->name('admin.informasiPpdb.save');
});

// Route untuk Editor
Route::prefix('editor')->group(function () {
    Route::get('/editor/informasi-ppdb', [InforrmasiPpdbController::class, 'edit1'])->name('editor.informasiPpdb.edit');
    Route::post('/editor/informasi-ppdb', [InforrmasiPpdbController::class, 'save1'])->name('editor.informasiPpdb.save');
});

//mengambil data ppdb
Route::get('/ppdb', [InforrmasiPpdbController::class, 'showInfoPpdb'])->name('ppdb');

//route hubungi kami
// Route untuk Admin
Route::prefix('admin')->group(function () {
    Route::get('/admin/hubungikami', [HubungiKamiController::class, 'edit'])->name('admin.hubungiKami.edit');
    Route::post('/admin/hubungikami', [HubungiKamiController::class, 'save'])->name('admin.hubungi.save');
});

// Route untuk Editor
Route::prefix('editor')->group(function () {
    Route::get('/editor/hubungikami', [HubungiKamiController::class, 'edit1'])->name('editor.hubungiKami.edit');
    Route::post('/editor/hubungikami', [HubungiKamiController::class, 'save1'])->name('editor.hubungi.save');
});

//mengambil data hubungi kami
Route::get('/hubungiKami', [HubungiKamiController::class, 'showInfoHubungiKami'])->name('hubungiKami');


//route arsip
// Route untuk Admin
Route::prefix('admin')->group(function () {
    Route::get('/admin/arsip', [ArsipController::class, 'edit'])->name('admin.informasiArsip.edit');
    Route::post('/admin/arsip', [ArsipController::class, 'save'])->name('admin.informasiArsip.save');
});
// Route untuk Editor
Route::prefix('editor')->group(function () {
    Route::get('/editor/arsip', [ArsipController::class, 'edit1'])->name('editor.informasiArsip.edit');
    Route::post('/editor/arsip', [ArsipController::class, 'save1'])->name('editor.informasiArsip.save');
});

//mengambil data arsip
Route::get('/arsip', [ArsipController::class, 'showInfoArsip'])->name('arsip');

//mengambil data sejarah
Route::get('/sejarah', [ProfilInformasiDasarController::class, 'showSejarah'])->name('sejarah');

//mengambil data visimisi
Route::get('/visi-misi', [ProfilInformasiDasarController::class, 'showVisiMisi'])->name('visiMisi');

//mengambil struktur organisasi
Route::get('/struktur-organisasi', [ProfilInformasiDasarController::class, 'showStruktur'])->name('struktur');

Route::get('/program-sekolah', [ProfilInformasiDasarController::class, 'showProgram'])->name('program');

Route::get('/showGallery', [GaleriController::class, 'showGallery'])->name('showGallery');

Route::get('kelola', [UserController::class, 'index'])->name('kelola');
Route::post('add-user', [UserController::class, 'store'])->name('adduser');
Route::post('edit-user/{id}', [UserController::class, 'edit'])->name('edituser');
Route::delete('delete-user/{id}', [UserController::class, 'delete'])->name('deleteuser');