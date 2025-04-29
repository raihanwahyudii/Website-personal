<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AtasanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\RapatController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin
Route::middleware('auth', 'role:admin')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::resource('meetings', MeetingController::class);
    Route::get('meetings/{meeting}/pdf', [MeetingController::class, 'downloadPdf'])->name('meetings.pdf');
});

// Pegawai
Route::middleware('auth', 'role:pegawai')->group(function () {
    Route::resource('/pegawai', PegawaiController::class);
});

// Atasan
Route::middleware('auth', 'role:atasan')->group(function () {
    Route::resource('/atasan', AtasanController::class);
});
