<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FrontendController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\GaleriController;

Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/tentang', [FrontendController::class, 'tentang'])->name('tentang');
Route::get('/berita', [FrontendController::class, 'berita'])->name('berita');
Route::get('/galeri', [FrontendController::class, 'galeri'])->name('galeri');
Route::get('/kontak', [FrontendController::class, 'kontak'])->name('kontak');

// User protected route for reading full news
Route::get('/berita/baca/{berita}', [FrontendController::class, 'showBerita'])->name('berita.show')->middleware('auth');

// Redefine standard dashboard for regular users? Using default dashboard for now.
Route::get('/dashboard', function () {
    // If admin, redirect to admin dashboard
    if (auth()->user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Admin Routes
Route::prefix('admin')->name('admin.')->middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('berita', BeritaController::class)->parameters([
        'berita' => 'berita'
    ]);
    Route::resource('galeri', GaleriController::class)->only(['index', 'store', 'destroy'])->parameters([
        'galeri' => 'galeri'
    ]);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
