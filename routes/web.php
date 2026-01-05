<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Authenticated Routes (SEMUA USER LOGIN)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    // Dashboard user biasa
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Admin Routes (KHUSUS ADMIN)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->group(function () {

    // Dashboard admin
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])
        ->name('admin.dashboard');

    // =====================
    // BUKU (RESOURCE)
    // =====================
    Route::resource('books', BookController::class);

    // =====================
    // ANGGOTA
    // =====================
    Route::get('/anggota', [AnggotaController::class, 'index'])->name('anggota.index');
    Route::get('/anggota/create', [AnggotaController::class, 'create'])->name('anggota.create');
    Route::post('/anggota', [AnggotaController::class, 'store'])->name('anggota.store');
    Route::get('/anggota/{anggota}/edit', [AnggotaController::class, 'edit'])->name('anggota.edit');
    Route::put('/anggota/{anggota}', [AnggotaController::class, 'update'])->name('anggota.update');
    Route::delete('/anggota/{anggota}', [AnggotaController::class, 'destroy'])->name('anggota.destroy');

    // =====================
    // PEMINJAMAN
    // =====================
    Route::resource('peminjaman', PeminjamanController::class);

    // Aksi pengembalian buku
    Route::patch('/peminjaman/{loan}/kembali', [PeminjamanController::class, 'kembali'])
        ->name('peminjaman.kembali');
    Route::delete('/peminjaman/{loan}', [PeminjamanController::class, 'destroy'])
        ->name('peminjaman.destroy');
});

/*
|--------------------------------------------------------------------------
| User Routes (KHUSUS USER)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'user'])->group(function () {

    // User hanya bisa melihat daftar buku
    Route::get('/buku', [BookController::class, 'indexUser'])->name('buku.index');
});

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
require __DIR__ . '/auth.php';
