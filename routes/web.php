<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegisterForm']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/', function () {
    return view('home');
})->middleware('auth');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::view('/produk', 'produk');
Route::view('/tentang', 'tentang');
Route::view('/kontak', 'kontak');
