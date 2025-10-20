<?php


use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SellerController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::resource('/cart', CartController::class);

Route::middleware(['auth'])->group(function () {
    Route::get('/order', [OrderController::class, 'index'])->name('order.index');
    Route::get('/order/{order}', [OrderController::class, 'show'])->name('order.show');
    Route::put('/order/{id}', [OrderController::class, 'update'])->name('order.update');
    Route::get('/checkout/{product}', [OrderController::class, 'create'])->name('order.create');
    Route::post('/checkout', [OrderController::class, 'store'])->name('order.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified', 'role:penjual'])->group( function() {
    Route::resource('seller', SellerController::class);
    Route::resource('seller/products', ProductController::class)->except(['show']);
});

require __DIR__.'/auth.php';
