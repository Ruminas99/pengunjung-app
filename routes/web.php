<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\LaporanController;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\HarianExport;
use App\Exports\BulananExport;

Route::get('/', function () {
    return redirect()->route('laporan');
});

    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan');
    Route::get('/bulanan', [LaporanController::class, 'laporanBulanan'])->name('laporanbulanan');
    

    Route::post('/pihak', [FormController::class, 'storePihak'])->name('pihak.store');
    Route::post('/dinas', [FormController::class, 'storeDinas'])->name('dinas.store');
    Route::post('/ptsp', [FormController::class, 'storePtsp'])->name('ptsp.store');
    Route::post('/mahasiswa', [FormController::class, 'storeMahasiswa'])->name('mahasiswa.store');

    Route::get('/laporan/export-harian', [LaporanController::class, 'exportHarian'])->name('export.harian');
    Route::get('/laporan/export-bulanan', [LaporanController::class, 'exportBulanan'])->name('export.bulanan');