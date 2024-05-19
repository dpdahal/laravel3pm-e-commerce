<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\ApplicationController;
use App\Http\Controllers\Backend\Dashboard\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\User\UserController;


Route::get('/', [ApplicationController::class, 'index'])->name('index');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
//product details
Route::get('/product-details/{slug}', [ApplicationController::class, 'productDetails'])->name('product-details');



Route::group(['namespace' => 'Backend', 'prefix' => 'company-backend', 'middleware' => 'auth'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', [UserController::class, 'index'])->name('users');
        Route::get('/user-profile', [UserController::class, 'profile'])->name('user-profile');
    });

    Route::resource('manage-section',"\App\Http\Controllers\Backend\Section\SectionController");
    Route::resource('manage-category',"\App\Http\Controllers\Backend\Category\CategoryController");
    Route::resource('manage-product',"\App\Http\Controllers\Backend\Product\ProductController");
//add multiple images
    Route::any('manage-product/add-images/{id}',"\App\Http\Controllers\Backend\Product\ProductController@addImages")->name('manage-product.add-images');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});
