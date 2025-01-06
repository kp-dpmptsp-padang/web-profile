<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;

Route::get('/', [GuestController::class, 'home'])->name('home');
Route::get('/tentang', [GuestController::class, 'about'])->name('about');
Route::get('/layanan', [GuestController::class, 'layanan'])->name('layanan');
Route::get('/fasilitas', [GuestController::class, 'fasilitas'])->name('fasilitas');
Route::get('/informasi', [GuestController::class, 'informasi'])->name('informasi');
Route::get('/dokumen', [GuestController::class, 'dokumen'])->name('dokumen');