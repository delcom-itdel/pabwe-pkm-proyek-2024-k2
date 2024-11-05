<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;



//awal
Route::get('/', function () {
    return view('app/home');
});

//tombol login
Route::get('/login', [LoginController::class, 'index'])->name('login'); // Route for shop page

// Handle login form submission
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

// Logout route
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Admin page (protected route)
Route::get('/admin', function () {
    return view('app/admin');
})->name('admin')->middleware('auth');
