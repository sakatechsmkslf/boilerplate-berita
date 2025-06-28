<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'do_login'])->name('do_login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function() {
    Route::resource('/', HomeController::class);

    Route::resource('kategori', KategoriController::class);
    Route::resource('tag', TagController::class);

    Route::resource('berita', BeritaController::class)->parameters(['berita' => 'berita']);
});

