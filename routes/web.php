<?php

use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\BobotController;
use App\Http\Controllers\DaftarContoroller;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\SkalaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main');
});

Route::resource('/daftar', DaftarContoroller::class);
Route::resource('/kriteria', KriteriaController::class);
Route::resource('/skala', SkalaController::class);
Route::resource('/bobot', BobotController::class);
Route::resource('/penilaian', PenilaianController::class);
Route::resource('/alternatif', AlternatifController::class);

