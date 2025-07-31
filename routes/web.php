<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

    Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');
    Route::get('/pihak', fn () => view('form/pihak'))->name('pihak');
    Route::get('/mahasiswa', fn () => view('form/mahasiswa'))->name('mahasiswa');
    Route::get('/dinas', fn () => view('form/dinas'))->name('dinas');
    Route::get('/ptsp', fn () => view('form/ptsp'))->name('ptsp');
    Route::get('/laporan', fn () => view('laporan'))->name('laporan');

    Route::post('/pihak', [FormController::class, 'storePihak'])->name('pihak.store');
    Route::post('/dinas', [FormController::class, 'storeDinas'])->name('dinas.store');
    Route::post('/ptsp', [FormController::class, 'storePtsp'])->name('ptsp.store');
    Route::post('/mahasiswa', [FormController::class, 'storeMahasiswa'])->name('mahasiswa.store');
