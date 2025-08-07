<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\LaporanController;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\HarianExport;
use App\Exports\BulananExport;
use App\Http\Controllers\PihakController;


Route::get('/', function () {
    return redirect()->route('dashboard');
});
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan');
    Route::get('/bulanan', [LaporanController::class, 'laporanBulanan'])->name('laporanbulanan');
    
    Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');
    Route::get('/pihak', [PihakController::class, 'create'])->name('pihak');

    Route::get('/mahasiswa', fn () => view('form/mahasiswa'))->name('mahasiswa');
    Route::get('/dinas', fn () => view('form/dinas'))->name('dinas');
    Route::get('/ptsp', fn () => view('form/ptsp'))->name('ptsp');
    Route::get('/kehadiran', fn () => view('kehadiran'))->name('kehadiran');

    Route::post('/pihak', [FormController::class, 'storePihak'])->name('pihak.store');
    Route::post('/dinas', [FormController::class, 'storeDinas'])->name('dinas.store');
    Route::post('/ptsp', [FormController::class, 'storePtsp'])->name('ptsp.store');
    Route::post('/mahasiswa', [FormController::class, 'storeMahasiswa'])->name('mahasiswa.store');

    Route::get('/laporan/export-harian', [LaporanController::class, 'exportHarian'])->name('export.harian');
    Route::get('/laporan/export-bulanan', [LaporanController::class, 'exportBulanan'])->name('export.bulanan');
    Route::get('/get-pihak/{id}', [PihakController::class, 'getPihak']);

    Route::get('/kehadiran', [PihakController::class, 'kehadiran'])->name('pihak.kehadiran');
    Route::get('/kehadiran/{nomor_perkara}', [PihakController::class, 'kehadiranByPerkara'])->name('pihak.kehadiran.perkara');
    Route::get('/kehadiran/{perkara_id?}', [PihakController::class, 'kehadiran'])->name('kehadiran.index');