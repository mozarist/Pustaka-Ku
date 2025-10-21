<?php


use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');


Route::middleware(['auth'])->group(function () {
    Route::get('/pinjaman', [OrderController::class, 'index'])->name('order.index');
    Route::get('/pinjaman/{order}', [OrderController::class, 'show'])->name('order.show');
    Route::put('/pinjaman/{id}', [OrderController::class, 'update'])->name('order.update');
    Route::get('/pinjam/{product}', [OrderController::class, 'create'])->name('order.create');
    Route::post('/pinjam', [OrderController::class, 'store'])->name('order.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified', 'role:admin'])->group( function() {
    Route::resource('admin', AdminController::class);
    Route::resource('admin/products', ProductController::class)->except(['show']);
});

require __DIR__.'/auth.php';
