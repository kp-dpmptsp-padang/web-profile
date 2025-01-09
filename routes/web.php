<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

// Authenticated
Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Super Admin
Route::middleware(['auth', 'role:super-admin'])->group(function () {
    // Users
    Route::get('/super-admin/daftar-admin', [UserController::class, 'index'])->name('users.index');
    Route::post('/super-admin/admin', [UserController::class, 'store'])->name('users.store');
    Route::put('/super-admin/admin/{id}', [UserController::class, 'update'])->name('users.update');
    Route::patch('/super-admin/admin/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/super-admin/admin/{id}', [UserController::class, 'destroy'])->name('users.destroy');
});

// Admin
Route::middleware('auth')->group(function () {

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Post
    Route::get('/admin/postingan', [PostController::class, 'index'])->name('posts.index');
    Route::post('/admin/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/admin/posts/{id}', [PostController::class, 'show'])->name('posts.show');
    Route::put('/admin/posts/{id}', [PostController::class, 'update'])->name('posts.update');
    Route::patch('/admin/posts/{id}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/admin/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

    // Tags
    Route::get('/admin/tags', [TagController::class, 'index'])->name('tags.index');
    Route::post('/admin/tags', [TagController::class, 'store'])->name('tags.store');
    Route::put('/admin/tags/{id}', [TagController::class, 'update'])->name('tags.update');
    Route::delete('/admin/tags/{id}', [TagController::class, 'destroy'])->name('tags.destroy');
});

// Guest
Route::middleware('guest')->group(function () {
    Route::get('/', [GuestController::class, 'home'])->name('home');
    Route::get('/tentang', [GuestController::class, 'about'])->name('about');
    Route::get('/layanan', [GuestController::class, 'layanan'])->name('layanan');
    Route::get('/fasilitas', [GuestController::class, 'fasilitas'])->name('fasilitas');
    Route::get('/informasi', [GuestController::class, 'informasi'])->name('informasi');
    Route::get('/dokumen', [GuestController::class, 'dokumen'])->name('dokumen');
});

require __DIR__.'/auth.php';