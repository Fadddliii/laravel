<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\JelajahiController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;

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

Route::get('/produk', [ProductController::class, 'index']);

Route::get('/jelajahi', [JelajahiController::class, 'index'])->middleware('auth');

Route::get('/beli/{id}', [OrderController::class, 'create'])->name('order.create');
Route::post('/beli', [OrderController::class, 'store'])->name('order.store');

Route::middleware(['auth'])->group(function () {
    // Tampilkan halaman keranjang
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

    // Tambah item ke keranjang
    Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');

    // Perbarui jumlah item di keranjang
    Route::delete('/cart/update', [CartController::class, 'update'])->name('cart.update');
    

    // Hapus satu item (DELETE)
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

    // Checkout (simpan pesanan)
    Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
});