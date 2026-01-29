<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| ROUTE PUBLIK (BELUM LOGIN)
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'doLogin']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'doRegister']);

/*
|--------------------------------------------------------------------------
| ROUTE AUTH (SUDAH LOGIN)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // Logout
    Route::post('/logout', [AuthController::class, 'logout']);

    // Dashboard
    Route::get('/dashboard', fn () => view('dashboard'));

    // Produk (lihat & search)
    Route::get('/products', [ProductController::class, 'index']);

    // Keranjang
    Route::get('/cart', [CartController::class, 'index']);
    Route::post('/cart/add/{id}', [CartController::class, 'add']);
    Route::post('/cart/update/{id}', [CartController::class, 'updateQty']);
    Route::delete('/cart/delete/{id}', [CartController::class, 'delete']);

    // Checkout & Order
    Route::post('/checkout', [OrderController::class, 'checkout']);
    Route::get('/orders', [OrderController::class, 'history']);
});

/*
|--------------------------------------------------------------------------
| ROUTE ADMIN ONLY
|--------------------------------------------------------------------------
| Middleware: auth + admin
*/
Route::middleware(['auth', 'admin'])->group(function () {

    // Produk (CRUD admin)
    Route::get('/products/create', [ProductController::class, 'create']);
    Route::post('/products', [ProductController::class, 'store']);

    Route::get('/products/edit/{id}', [ProductController::class, 'edit']);
    Route::post('/products/update/{id}', [ProductController::class, 'update']);

    Route::delete('/products/delete/{id}', [ProductController::class, 'delete']);
});
//check invoice
Route::get('/invoice/{id}', [OrderController::class, 'invoicePdf']);
