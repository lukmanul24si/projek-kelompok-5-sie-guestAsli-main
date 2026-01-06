<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Guest\UmkmController;
use App\Http\Controllers\Guest\CartController;
use App\Http\Controllers\Guest\SellerController;
<<<<<<< HEAD
=======
use App\Http\Controllers\Admin\UlasanProdukController as AdminUlasanProdukController;
use App\Models\Produk;
>>>>>>> 3acb0d8 (Menghubungkan projek lokal ke github)

/* --- 1. HALAMAN PUBLIK --- */
Route::get('/', function () { return view('koppee.index'); })->name('homepage');
Route::get('/umkm-list', [UmkmController::class, 'index'])->name('guest.umkm.index');
Route::get('/umkm/{id}', [UmkmController::class, 'show'])->name('guest.umkm.show');
Route::get('/menu', [UmkmController::class, 'allProducts'])->name('menu');

/* --- 2. AUTHENTICATION (Login/Register) --- */
Auth::routes();

/* --- 3. FITUR PEMBELI & UMUM (Wajib Login) --- */
Route::middleware(['auth'])->group(function () {
    
<<<<<<< HEAD
    // KERANJANG BELANJA (Cart)
    Route::prefix('cart')->name('cart.')->group(function () {
        Route::get('/', [CartController::class, 'index'])->name('index');
        Route::post('/add/{id}', [CartController::class, 'add'])->name('add');
        Route::delete('/remove/{id}', [CartController::class, 'remove'])->name('remove');
        Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout');
    });

    // ULASAN PRODUK (Review)
=======
    // KERANJANG BELANJA dinonaktifkan

    // ULASAN PRODUK (Review)
    Route::get('/produk/{id}/ulasan', function ($id) {
        $produk = Produk::with('umkm')->findOrFail($id);
        return redirect()->route('guest.umkm.show', $produk->umkm_id);
    })->name('ulasan.show.redirect');

>>>>>>> 3acb0d8 (Menghubungkan projek lokal ke github)
    Route::post('/produk/{id}/ulasan', [UmkmController::class, 'storeUlasan'])->name('ulasan.store');
    Route::get('/ulasan/{id}/edit', [UmkmController::class, 'editUlasan'])->name('ulasan.edit');
    Route::put('/ulasan/{id}', [UmkmController::class, 'updateUlasan'])->name('ulasan.update');
    Route::delete('/ulasan/{id}', [UmkmController::class, 'destroyUlasan'])->name('ulasan.destroy');
<<<<<<< HEAD
    
    // RIWAYAT PESANAN
    Route::get('/riwayat-pesanan', [CartController::class, 'history'])->name('guest.orders.history');

    // DAFTAR JADI PENJUAL
    Route::get('/daftar-umkm', [UmkmController::class, 'create'])->name('guest.umkm.create');
    Route::post('/daftar-umkm', [UmkmController::class, 'store'])->name('guest.umkm.store');

}); 

=======

}); 

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/ulasan-produk', [AdminUlasanProdukController::class, 'index'])->name('admin.ulasan.index');
});

>>>>>>> 3acb0d8 (Menghubungkan projek lokal ke github)
/* --- 4. FITUR PENJUAL / TOKO SAYA (My Shop) --- */
Route::middleware(['auth'])->prefix('my-shop')->name('guest.shop.')->group(function () {
    
    // DASHBOARD TOKO
    Route::get('/', [SellerController::class, 'index'])->name('index');
    
    // KELOLA PRODUK (CRUD)
    Route::get('/product/create', [SellerController::class, 'createProduct'])->name('product.create');
    Route::post('/product/store', [SellerController::class, 'storeProduct'])->name('product.store');
    Route::get('/product/{id}/edit', [SellerController::class, 'editProduct'])->name('product.edit');
    Route::put('/product/{id}/update', [SellerController::class, 'updateProduct'])->name('product.update');
    Route::delete('/product/{id}', [SellerController::class, 'destroyProduct'])->name('product.destroy');

    // EDIT PROFIL TOKO
    // Route ini yang tadi error, sekarang sudah benar di sini:
    Route::get('/umkm/edit', [UmkmController::class, 'edit'])->name('umkm.edit');
    Route::put('/umkm/update', [UmkmController::class, 'update'])->name('umkm.update');

});

/* --- 5. REDIRECT LAINNYA --- */
<<<<<<< HEAD
Route::redirect('/home', '/');
=======
Route::redirect('/home', '/');
>>>>>>> 3acb0d8 (Menghubungkan projek lokal ke github)
