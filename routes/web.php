<?php

use App\Http\Controllers\User\Auth\LoginController;
use App\Http\Controllers\User\Auth\RegisterController;
use App\Http\Controllers\User\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['guest'])->group(function () {
    Route::controller(RegisterController::class)->group(function () {
        Route::get('/register', 'index')->name('user.register');
        Route::post('/register', 'create')->name('user.make.register');
    });

    Route::controller(LoginController::class)->group(function () {
        Route::get('/login', 'index')->name('user.login');
        Route::post('/login', 'login')->name('user.make.login');
    });
});



Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('user.home');
    Route::get('/product-details/{slug}', 'product_details')->name('user.product_details');
    Route::get('/shop', 'shop')->name('user.shop');
    Route::get('/category', 'category')->name('user.category');
    Route::get('/brand', 'brands')->name('user.brand');
    Route::get('/shop/category/{id}', 'product_by_category')->name('user.shop.category');
    Route::get('/shop/category/{id}/{cat_id}', 'product_by_sub_category')->name('user.shop.sub.category');
    Route::get('/shop/category/{id}/{cat_id}/{sub_id}', 'product_by_child_category')->name('user.shop.child.category');
    Route::middleware(['auth'])->group(function () {
        Route::get('/add_to_wishlist/{id}', 'add_to_wishlist')->name('user.add_to_wishlist');
        Route::get('/add_to_wishlist/{id}', 'add_to_wishlist')->name('user.add_to_wishlist');
        Route::get('/add_to_wishlist/{id}', 'add_to_wishlist')->name('user.add_to_wishlist');
        Route::get('/add_to_compare/{id}', 'add_to_compare')->name('user.add_to_compare');
        Route::get('/add_to_cart/{id}', 'add_to_cart')->name('user.add_to_cart');
    });
});


require_once 'admin.php';
