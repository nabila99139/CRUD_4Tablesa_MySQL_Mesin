<?php

use App\Http\Controllers\GeneralController;
use App\Http\Controllers\HalamanController;
use App\Http\Controllers\JenisMesinController;
use App\Http\Controllers\MerkMesinController;
use App\Http\Controllers\MesinController;
use App\Http\Controllers\MutasiMesinController;
use Illuminate\Support\Facades\Route;


// Route::get('/', [MesinController::class, 'index']);
// Route::get('/mesin/{id}', [MesinController::class, 'detail']);

Route::resource('jenis_mesin', JenisMesinController::class);
Route::resource('merk_mesin', MerkMesinController::class);
Route::resource('mutasi_mesin', MutasiMesinController::class);
Route::resource('mesin', MesinController::class);
Route::resource('/', GeneralController::class);
// Route::resource('/', GeneralController::class)->names([
//     'show' => 'detail',
// ]);

Route::get('/{id}', [GeneralController::class, 'show'])->name('detail');