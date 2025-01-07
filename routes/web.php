<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\BeritaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [GuestController::class, 'home'])->name('home');
Route::get('/tentang', [GuestController::class, 'about'])->name('about');
Route::get('/layanan', [GuestController::class, 'layanan'])->name('layanan');
Route::get('/fasilitas', [GuestController::class, 'fasilitas'])->name('fasilitas');
Route::get('/informasi', [GuestController::class, 'informasi'])->name('informasi');
Route::get('/dokumen', [GuestController::class, 'dokumen'])->name('dokumen');

Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');

require __DIR__.'/auth.php';