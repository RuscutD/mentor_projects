<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\ProductsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('product.welcome');
});

Route::get('/welcome', function () {
    return view('product.welcome');
});

Route::get('/layouts', function () {
    return view('layouts.default');
});

Route::get('/admin', function () {
    return view('product.create');
});

Route::get('/cart', function () {
    return view('cart.cart');
});

Route::get('test', [ProductController::class, 'productList'])->name('products.list');
Route::get('cart', [CartsController::class, 'cartList'])->name('cart.list');
Route::post('cart', [CartsController::class, 'addToCart'])->name('cart.store');
Route::post('update-buynow', [CartsController::class, 'addAndBuyNow'])->name('cart.buynow');
Route::post('update-cart', [CartsController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [CartsController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [CartsController::class, 'clearAllCart'])->name('cart.clear');
Route::post('cart-checkout', [CartsController::class, 'checkout'])->name('cart.checkout');

Route::resource('product', ProductsController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
