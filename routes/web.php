<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

// halaman awal
Route::get('/', function () {
    return view('welcome');
});

// dashboard (WAJIB LOGIN)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// route yg butuh login
Route::middleware('auth')->group(function () {

    // profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CRUD buku
    Route::middleware(['auth'])->group(function () {
    Route::resource('books', BookController::class);
});
});

require __DIR__.'/auth.php';
