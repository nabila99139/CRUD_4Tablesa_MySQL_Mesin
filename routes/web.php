<?php

use App\Http\Controllers\GeneralController;
use App\Http\Controllers\HalamanController;
use App\Http\Controllers\JenisMesinController;
use App\Http\Controllers\MerkMesinController;
use App\Http\Controllers\mesinCE_Controller;
use App\Http\Controllers\MesinController;
use App\Http\Controllers\MutasiMesinController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;


// Route::get('/', [MesinController::class, 'index']);
// Route::get('/mesin/{id}', [MesinController::class, 'detail']);

//---------------------------------------------------------------------------------------

Route::middleware(['guest'])->group(function () {
    Route::get('/', [SessionController::class, 'index'])->name('login');
    Route::post('/sesi/login', [SessionController::class, 'login']);
    // Route::get('/sesi/register', [SessionController::class, 'register']);
    // Route::post('/sesi/create', [SessionController::class, 'create']);
});

Route::middleware(['auth'])->group(function () {
    // Admin
    Route::middleware(['userAkses:admin'])->group(function () {
        Route::resource('mesinCE', mesinCE_Controller::class);
    });

    // Super Admin
    Route::middleware(['userAkses:super_admin'])->group(function () {
        Route::resource('jenis_mesin', JenisMesinController::class);
        Route::resource('merk_mesin', MerkMesinController::class);
        Route::resource('mutasi_mesin', MutasiMesinController::class);
        Route::resource('mesin', MesinController::class);
        Route::get('/sesi/register', [SessionController::class, 'register']);
        Route::post('/sesi/create', [SessionController::class, 'create']);
    
    });

    Route::get('/semua_table', [GeneralController::class, 'index']);
    Route::get('/semua_table/{id}', [GeneralController::class, 'show'])->name('detail');
    Route::get('/sesi/logout', [SessionController::class, 'logout']);
});

Route::middleware(['auth'])->group(function () {
    // Logout
    Route::get('/sesi/logout', [SessionController::class, 'logout']);
});
