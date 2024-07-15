<?php

use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\BobotController;
use App\Http\Controllers\DaftarContoroller;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\KuesionerPakar;
use App\Http\Controllers\KuesionerPakarController;
use App\Http\Controllers\KuesionerUserController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\SkalaController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('main');
});

// Route::resource('/daftar', DaftarContoroller::class);
// Route::resource('/skala', SkalaController::class);
// Route::resource('/bobot', BobotController::class);
// Route::resource('/penilaian', PenilaianController::class);
Route::resource('/alternatif', AlternatifController::class);
Route::group(['prefix' => 'kriteria'], function () {
    Route::get('/', [KriteriaController::class, 'index'])->name('kriteria.index');
    Route::get('/create', [KriteriaController::class, 'create'])->name('kriteria.create');
    Route::post('/store', [KriteriaController::class, 'store'])->name('kriteria.store');
    Route::get('/edit/{kriteria}', [KriteriaController::class, 'edit'])->name('kriteria.edit');
    Route::put('/update/{kriteria}', [KriteriaController::class, 'update'])->name('kriteria.update');
    Route::delete('/destroy/{kriteria}', [KriteriaController::class, 'destroy'])->name('kriteria.destroy');
});
Route::resource('/perhitungan', PerhitunganController::class);

// Route::resource('/kriteria', KriteriaController::class);
// Route::resource('/kuesioneruser', KuesionerUserController::class);
// Route::resource('/kuesionerpakar', KuesionerPakarController::class);

