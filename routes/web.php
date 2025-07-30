<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

    Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');
    Route::get('/pihak', fn () => view('form/pihak'))->name('pihak');
    Route::get('/mahasiswa', fn () => view('form/mahasiswa'))->name('mahasiswa');
    Route::get('/dinas', fn () => view('form/dinas'))->name('dinas');
    Route::get('/ptsp', fn () => view('form/ptsp'))->name('ptsp');
    Route::get('/laporan', fn () => view('laporan'))->name('laporan');


