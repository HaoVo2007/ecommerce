<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('admin_dashboard');

Route::prefix('admin')->group(function () {
    Route::get('product/view', [ProductController::class, 'viewProduct']);
    //ADMIN PRODUCT
    Route::get('/product/add_product/view', [ProductController::class, 'viewAddProduct']);
    Route::get('/product', [ProductController::class, 'getProduct']);
    Route::post('/product/add_product', [ProductController::class, 'addProduct']);
    //ADMIN PRODUCT

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
