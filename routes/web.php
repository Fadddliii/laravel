<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\JelajahiController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;

/**
 * Guest Routes
 */
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegisterForm'])->middleware('guest');
Route::post('/register', [AuthController::class, 'register']);

/**
 * Public Home (harus login)
 */
Route::get('/', function () {
    return view('home');
})->middleware('auth');

/**
 * Logout
 */
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

/**
 * Produk dan Jelajahi
 */
Route::get('/produk', [ProductController::class, 'index'])->middleware('auth');
Route::get('/jelajahi', [JelajahiController::class, 'index'])->middleware('auth');

/**
 * Halaman Informasi
 */
Route::view('/tentang', 'tentang')->middleware('auth');
Route::view('/kontak', 'kontak')->middleware('auth');

/**
 * Order Produk (Beli Sekarang)
 */
Route::get('/beli/{id}', [OrderController::class, 'create'])->name('order.create')->middleware('auth');
Route::post('/beli', [OrderController::class, 'store'])->name('order.store')->middleware('auth');

/**
 * Cart System
 */
Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::delete('/cart/update', [CartController::class, 'update'])->name('cart.update');
    Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
    Route::get('/riwayat', [CartController::class, 'history'])->name('cart.history');
});

/**
 * Admin Dashboard - akses hanya untuk user dengan role admin
 */
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/orders', [CartController::class, 'adminOrders'])->name('admin.orders');
});
