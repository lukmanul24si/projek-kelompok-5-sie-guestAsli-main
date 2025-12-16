<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Guest\UmkmController;
use App\Http\Controllers\Guest\CartController;
use App\Http\Controllers\Guest\SellerController;

/* --- HALAMAN PUBLIK --- */
Route::get('/', function () { return view('koppee.index'); })->name('homepage');
Route::get('/umkm-list', [UmkmController::class, 'index'])->name('guest.umkm.index');
Route::get('/umkm/{id}', [UmkmController::class, 'show'])->name('guest.umkm.show');
Route::get('/menu', [UmkmController::class, 'allProducts'])->name('menu');

/* --- AUTH --- */
Auth::routes();

/* --- GUEST: PEMBELI (Wajib Login) --- */
Route::middleware(['auth'])->group(function () {
    // Cart
    Route::prefix('cart')->name('cart.')->group(function () {
        Route::get('/', [CartController::class, 'index'])->name('index');
        Route::post('/add/{id}', [CartController::class, 'add'])->name('add');
        Route::delete('/remove/{id}', [CartController::class, 'remove'])->name('remove');
        Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout');
    });
    // Ulasan
    Route::post('/produk/{id}/ulasan', [UmkmController::class, 'storeUlasan'])->name('ulasan.store');
    
    // Riwayat Pesanan
    Route::get('/riwayat-pesanan', [CartController::class, 'history'])->name('guest.orders.history');

    // Daftar UMKM
    Route::get('/daftar-umkm', [UmkmController::class, 'create'])->name('guest.umkm.create');
    Route::post('/daftar-umkm', [UmkmController::class, 'store'])->name('guest.umkm.store');
});

/* --- GUEST: PENJUAL (CRUD Produk) --- */
Route::middleware(['auth'])->prefix('my-shop')->name('guest.shop.')->group(function () {
    Route::get('/', [SellerController::class, 'index'])->name('index');
    Route::get('/product/create', [SellerController::class, 'createProduct'])->name('product.create');
    Route::post('/product/store', [SellerController::class, 'storeProduct'])->name('product.store');
    
    // Tambahan untuk Edit & Update
    Route::get('/product/{id}/edit', [SellerController::class, 'editProduct'])->name('product.edit');
    Route::put('/product/{id}/update', [SellerController::class, 'updateProduct'])->name('product.update');
    
    Route::delete('/product/{id}', [SellerController::class, 'destroyProduct'])->name('product.destroy');
});
Route::redirect('/home', '/');