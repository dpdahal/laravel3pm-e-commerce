<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\ApplicationController;
use App\Http\Controllers\Backend\Dashboard\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\User\UserController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Backend\Product\ProductController;
use App\Http\Controllers\AjaxController;


Route::get('/', [ApplicationController::class, 'index'])->name('index');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
//product details
Route::get('/product-details/{slug}', [ApplicationController::class, 'productDetails'])->name('product-details');
Route::get('/payment', [ApplicationController::class, 'payment'])->name('payment');
Route::get('/payment-success', [ApplicationController::class, 'paymentSuccess'])->name('payment-success');

// ajax crud
Route::get('student', [AjaxController::class, 'index'])->name('student');
Route::get('get-student', [AjaxController::class, 'getStudents'])->name('get-student');
Route::post('add-student', [AjaxController::class, 'addStudent'])->name('add-student');

Route::post('delete-student', [AjaxController::class, 'deleteStudent'])->name('delete-student');

Route::get('cart', [CartController::class, 'index'])->name('cart');
Route::get('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add-to-cart');
Route::patch('update-cart', [CartController::class, 'update'])->name('update-cart');
Route::get('remove-from-cart/{id}', [CartController::class, 'remove'])->name('remove-from-cart');

//order
Route::any('order', [CartController::class, 'order'])->middleware('auth')->name('order');

Route::group(['namespace' => 'Backend', 'prefix' => 'company-backend', 'middleware' => 'auth'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', [UserController::class, 'index'])->name('users');
        Route::get('/user-profile', [UserController::class, 'profile'])->name('user-profile');
    });

    Route::resource('manage-section',"\App\Http\Controllers\Backend\Section\SectionController");
    Route::resource('manage-category',"\App\Http\Controllers\Backend\Category\CategoryController");
    Route::resource('manage-product',"\App\Http\Controllers\Backend\Product\ProductController");
    Route::any('manage-order',[ProductController::class,'order'])->name('manage-order');
//add multiple images
    Route::any('manage-product/add-images/{id}',"\App\Http\Controllers\Backend\Product\ProductController@addImages")->name('manage-product.add-images');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});
