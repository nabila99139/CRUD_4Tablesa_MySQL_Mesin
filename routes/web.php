<?php

use App\Http\Controllers\GeneralController;
use App\Http\Controllers\HalamanController;
use App\Http\Controllers\JenisMesinController;
use App\Http\Controllers\MerkMesinController;
use App\Http\Controllers\MesinController;
use App\Http\Controllers\MutasiMesinController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;


// Route::get('/', [MesinController::class, 'index']);
// Route::get('/mesin/{id}', [MesinController::class, 'detail']);

Route::resource('jenis_mesin', JenisMesinController::class);
Route::resource('merk_mesin', MerkMesinController::class);
Route::resource('mutasi_mesin', MutasiMesinController::class);
Route::resource('mesin', MesinController::class);

Route::resource('semua_table', GeneralController::class);
Route::get('semua_table/{id}', [GeneralController::class, 'show'])->name('detail');

Route::get('/', [SessionController::class, 'index']);
Route::post('/sesi/login', [SessionController::class, 'login']);
Route::get('/sesi/logout', [SessionController::class, 'logout']);

Route::get('/sesi/register', [SessionController::class, 'register']);
Route::post('/sesi/create', [SessionController::class, 'create']);
