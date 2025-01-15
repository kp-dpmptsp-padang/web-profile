<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\InovationController;
use App\Http\Controllers\QnAController;
use App\Http\Controllers\DocumentTypeController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\FacilityController;
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

    // Profiles
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Posts
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

    // Sliders
    Route::get('/admin/slider', [SliderController::class, 'index'])->name('slider.index');
    Route::post('/admin/slider', [SliderController::class, 'store'])->name('slider.store');
    Route::get('/slider/next-order', [SliderController::class, 'nextOrder'])->name('slider.nextOrder');
    Route::put('/admin/slider/{id}', [SliderController::class, 'update'])->name('slider.update');
    Route::delete('/admin/slider/{id}', [SliderController::class, 'destroy'])->name('slider.destroy');
    Route::patch('/admin/slider/{id}/status', [SliderController::class, 'toggleStatus'])->name('slider.toggleStatus');
    Route::patch('/admin/slider/{id}/order', [SliderController::class, 'changeOrder'])->name('slider.changeOrder');

    // Galleries
    Route::get('/admin/galeri', [GalleryController::class, 'index'])->name('gallery.index');
    Route::post('/admin/galeri', [GalleryController::class, 'store'])->name('gallery.store');
    Route::put('/admin/galeri/{id}', [GalleryController::class,'update'])->name('gallery.update');
    Route::delete('/admin/galeri/{id}', [GalleryController::class, 'destroy'])->name('gallery.destroy');

    // Videos
    Route::get('/admin/video', [VideoController::class, 'index'])->name('video.index');
    Route::post('/admin/video', [VideoController::class, 'store'])->name('video.store');
    Route::put('/admin/video/{id}', [VideoController::class,'update'])->name('video.update');
    Route::delete('/admin/video/{id}', [VideoController::class, 'destroy'])->name('video.destroy');

    // Inovations
    Route::get('/admin/inovasi', [InovationController::class, 'index'])->name('inovation.index');
    Route::post('/admin/inovasi', [InovationController::class, 'store'])->name('inovation.store');
    Route::put('/admin/inovasi/{id}', [InovationController::class,'update'])->name('inovation.update');
    Route::delete('/admin/inovasi/{id}', [InovationController::class, 'destroy'])->name('inovation.destroy');
    Route::patch('/admin/inovasi/{id}/status', [InovationController::class, 'toggleStatus'])->name('inovation.toggleStatus');

    // QnA's
    Route::get('/admin/pertanyaan', [QnAController::class, 'index'])->name('qna.index');
    Route::post('/admin/pertanyaan', [QnAController::class, 'store'])->name('qna.store');
    Route::put('/admin/pertanyaan/{id}', [QnAController::class,'update'])->name('qna.update');
    Route::delete('/admin/pertanyaan/{id}', [QnAController::class, 'destroy'])->name('qna.destroy');

    // Document Types
    Route::get('/admin/jenis-dokumen', [DocumentTypeController::class, 'index'])->name('documentType.index');
    Route::post('/admin/jenis-dokumen', [DocumentTypeController::class, 'store'])->name('documentType.store');
    Route::put('/admin/jenis-dokumen/{id}', [DocumentTypeController::class, 'update'])->name('documentType.update');
    Route::delete('/admin/jenis-dokumen/{id}', [DocumentTypeController::class, 'destroy'])->name('documentType.destroy');

    // Documents
    Route::get('/admin/dokumen', [DocumentController::class, 'index'])->name('document.index');
    Route::post('/admin/dokumen', [DocumentController::class, 'store'])->name('document.store');
    Route::put('/admin/dokumen/{id}', [DocumentController::class,'update'])->name('document.update');
    Route::delete('/admin/dokumen/{id}', [DocumentController::class, 'destroy'])->name('document.destroy');

    // Facility
    Route::get('/admin/fasilitas', [FacilityController::class, 'index'])->name('facility.index');
    Route::post('/admin/fasilitas', [FacilityController::class, 'store'])->name('facility.store');
    Route::put('/admin/fasilitas/{id}', [FacilityController::class,'update'])->name('facility.update');
    Route::delete('/admin/fasilitas/{id}', [FacilityController::class, 'destroy'])->name('facility.destroy');

});

Route::middleware('guest')->group(function () {
    Route::get('/', [GuestController::class, 'home'])->name('home');
    Route::get('/tentang', [GuestController::class, 'about'])->name('about');
    Route::get('/layanan', [GuestController::class, 'layanan'])->name('layanan');
    Route::get('/fasilitas', [GuestController::class, 'fasilitas'])->name('fasilitas');
    Route::get('/informasi', [GuestController::class, 'informasi'])->name('informasi');
    Route::get('/informasi/detail/{slug}', [GuestController::class, 'detailInfo'])->name('detail-info');
    Route::get('/berita/detail/{slug}', [GuestController::class, 'detailInfo'])->name('detail-berita');
    Route::get('/berita', [GuestController::class, 'berita'])->name('berita');
    Route::get('/dokumen', [GuestController::class, 'dokumen'])->name('dokumen');
    Route::get('/pertanyaan', [GuestController::class, 'faq'])->name('faq');
    Route::post('/question', [GuestController::class, 'storeQuestion'])->name('questions.store');

    Route::get('/home-survey', [SurveyController::class, 'home'])->name('home-survey');
    Route::get('/survey', [SurveyController::class, 'index'])->name('survey');
    Route::post('/survey', [SurveyController::class, 'store'])->name('survey.store');

});

require __DIR__.'/auth.php';