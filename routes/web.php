<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
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
    //ADMIN PRODUCT
    Route::get('product/view', [ProductController::class, 'viewProduct']);
    Route::get('/product/add_product/view', [ProductController::class, 'viewAddProduct']);
    Route::get('/product', [ProductController::class, 'getProduct']);
    Route::post('/product/add_product', [ProductController::class, 'addProduct']);
    Route::get('/product/edit_product/{id}', [ProductController::class, 'editProduct']);
    Route::post('/product/update_product/{id}', [ProductController::class, 'updateProduct']);
    Route::post('/product/delete_product/{id}', [ProductController::class, 'deleteProduct']);
    Route::post('/product/delete_product', [ProductController::class, 'deleteAllProduct']);
    //ADMIN PRODUCT
    //ADMIN CATEGORY
    Route::get('/category/view', [CategoryController::class, 'viewCategory']);
    Route::get('/category', [CategoryController::class, 'getCategory']);
    Route::get('/load_category', [CategoryController::class, 'loadCategory']);
    Route::post('/category/add_category', [CategoryController::class, 'addCategory']);

    //

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
