<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

// 🔁 Redirect setelah login berdasarkan role
Route::get('/dashboard', [RedirectController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// 🔐 Area yang hanya bisa diakses user login
Route::middleware(['auth'])->group(function () {
    // 🔧 Profil user
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');

    // 📰 Semua role bisa lihat daftar berita
    Route::get('/news', [NewsController::class, 'index'])->name('news.index');

    // ✏️ Hanya wartawan boleh tambah/edit/hapus berita
    Route::middleware('role:wartawan')->group(function () {
        Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
        Route::post('/news', [NewsController::class, 'store'])->name('news.store');
        Route::get('/news/{news}/edit', [NewsController::class, 'edit'])->name('news.edit');
        Route::put('/news/{news}', [NewsController::class, 'update'])->name('news.update');
        Route::delete('/news/{news}', [NewsController::class, 'destroy'])->name('news.destroy');
    });

    // ✅ Hanya editor bisa approve berita
    Route::middleware('role:editor')->put('/news/{id}/approve', [NewsController::class, 'approve'])->name('news.approve');

    // 🧠 Dashboard admin
    Route::middleware('role:admin')->get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // 📝 Verifikasi berita oleh editor
    Route::prefix('editor')->middleware('role:editor')->group(function () {
        Route::get('/news', [NewsController::class, 'pending'])->name('editor.news');
    });
});

require __DIR__.'/auth.php';
