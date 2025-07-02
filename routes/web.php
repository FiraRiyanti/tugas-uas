<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;


// Redirect dari halaman utama ke halaman login
Route::get('/', function () {
    return redirect('/login');
});

// Route untuk login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);

// Route untuk logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Route untuk data mitra — hanya bisa diakses jika sudah login
Route::middleware(['ceklogin'])->group(function () {
    Route::resource('mitra', MitraController::class);
});

Route::get('/mitra-export-pdf', [MitraController::class, 'exportPDF'])->name('mitra.export-pdf');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('ceklogin');

Route::middleware(['ceklogin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('mitra', MitraController::class);
});