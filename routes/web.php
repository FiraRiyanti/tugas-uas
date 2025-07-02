<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;


// Redirect dari halaman utama ke halaman login
Route::get('/', function () {
    return redirect('/login');
});

// Route untuk login/logout (tidak perlu auth)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Route untuk logout (perlu auth)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Route yang memerlukan authentication
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Mitra routes
    Route::resource('mitra', MitraController::class);
    Route::get('/mitra-export-pdf', [MitraController::class, 'exportPDF'])->name('mitra.export-pdf');
});