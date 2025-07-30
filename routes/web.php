<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

// REGISTER
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');

// LOGIN
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');

// PROTECTED ROUTES
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::get('/pihak', fn () => view('form/pihak'))->name('pihak');
    Route::get('/mahasiswa', fn () => view('form/mahasiswa'))->name('mahasiswa');
    Route::get('/dinas', fn () => view('form/dinas'))->name('dinas');
    Route::get('/ptsp', fn () => view('form/ptsp'))->name('ptsp');
    Route::get('/laporan', fn () => view('laporan'))->name('laporan');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

