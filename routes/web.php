<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Home\CartController;
use App\Http\Controllers\Home\CategoryController as HomeCategoryController;
use App\Http\Controllers\Home\ProductController as HomeProductController;
use App\Http\Controllers\ProfileController;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {

    session()->forget('countCart');

    if (Auth::check()) {
        $countCart = Cart::where('user_id', Auth::id())
            ->count();
    } else {
        $cart = session()->get('cart', []);
        $countCart = count($cart);
    }

    session()->put('countCart', $countCart);

    return view('home.index');
});

Route::get('/home', function () {

    session()->forget('countCart');

    if (Auth::check()) {
        $countCart = Cart::where('user_id', Auth::id())
            ->count();
    } else {
        $cart = session()->get('cart', []);
        $countCart = count($cart);
    }

    session()->put('countCart', $countCart);

    return view('home.index');

})->name('dashboard');

Route::get('/admin', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('admin_dashboard');

Route::get('language/{lang}', function ($lang) {
    session()->put('locale', $lang);
    session()->save();
    return redirect()->back();
})->name('language.switch');

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
    Route::get('/category/{id}', [CategoryController::class, 'editCategory']);
    Route::post('/category/update/{id}', [CategoryController::class, 'updateCategory']);
    Route::post('/category/delete_category/{id}', [CategoryController::class, 'deleteCategory']);
    Route::post('/category/delete_category', [CategoryController::class, 'deleteAllCategory']);
    //
});

Route::prefix('home')->group(function() {
    Route::get('/brand', [HomeCategoryController::class, 'getBrand']);
    //HOME PRODUCTS
    Route::get('/product', [HomeProductController::class, 'getProduct']);
    Route::get('/product/detail/{id}', [HomeProductController::class, 'viewDetail']);
    Route::post('/product/review', [HomeProductController::class, 'sendReviewProduct']);
    Route::get('/product/review', [HomeProductController::class, 'getReviewProduct']);
    //HOME PRODUCTS

    //HOME CART
    Route::get('/product/cart', [CartController::class, 'viewCart']);
    Route::post('/product/add_to_cart', [CartController::class, 'addToCart']);
    Route::get('/product/get_cart', [CartController::class, 'getCart']);
    Route::post('/product/delete/cart/{id}', [CartController::class, 'deleteProductCart']);
    Route::post('/product/update/cart/{id}', [CartController::class, 'updateQuantityCart']);

    //HOME CART


});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
