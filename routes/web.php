<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PenggunaController;

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', [HomeController::class, 'about']);

Route::get('/contact', [HomeController::class, 'contact']);

Route::get('/selamat-datang/{name}', function ($name) {
    return "<h1>Selamat Datang $name</h1>";
});

Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna.index');;

Route::get('/pengguna/create', [PenggunaController::class, 'create'])->name('pengguna.create');;

// Route::get('/pengguna/{id}', [PenggunaController::class, 'details'])->name('pengguna.id');

Route::get('/pengguna/{user}', [PenggunaController::class, 'details'])->name('pengguna.id');

Route::put('/pengguna/{user}', [PenggunaController::class, 'update'])->name('pengguna.update');

Route::post('/pengguna', [PenggunaController::class, 'store'])->name('pengguna.store');

