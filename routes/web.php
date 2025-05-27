<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SetoranController;
use App\Http\Controllers\SantriController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AdminController;

// Root route: jika sudah login redirect ke home, jika belum redirect ke login
Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('home');
    }
    return redirect()->route('login');
});

// Route auth bawaan Laravel (login, register, logout, dll)
Auth::routes();

// Setelah login, redirect ke home
Route::get('/home', function () {
    return redirect()->route('dashboard.redirect');
})->middleware('auth')->name('home');

// Redirect dashboard sesuai role user
Route::get('/dashboard-redirect', function () {
    $user = auth()->user();

    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    } elseif ($user->role === 'ustad') {
        return redirect()->route('setoran.index');
    } elseif ($user->role === 'santri') {
        return redirect()->route('santri.setoran');
    }

    abort(403, 'Role tidak dikenali.');
})->middleware('auth')->name('dashboard.redirect');

// Routes untuk Ustadz (role ustad)
Route::middleware(['auth', 'role:ustad'])->group(function () {
    Route::resource('setoran', SetoranController::class);
});

// Routes untuk Santri (role santri)
Route::middleware(['auth', 'role:santri'])->group(function () {
    Route::get('/santri/setoran', [SantriController::class, 'index'])->name('santri.setoran');
    Route::get('/santri/setoran/download', [SantriController::class, 'downloadPdf'])->name('santri.download');
});

// Routes untuk Admin (role admin) dengan prefix dan group name admin.*
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    // Kelola Santri
    Route::get('/santri', [UserController::class, 'santri'])->name('santri.index');

    // Kelola Ustadz
    Route::get('/ustad', [UserController::class, 'ustad'])->name('ustad.index');

    // Daftar User
    Route::get('/users', [UserController::class, 'index'])->name('users.index');

    // Tambah User (Santri/Ustadz)
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');

    // Edit & Update User
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');

    // Hapus User
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
});
