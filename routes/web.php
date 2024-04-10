<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Authentication\LoginController;
use App\Http\Controllers\Authentication\RegisterController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

// ====================================== ADMINISTRATION ================================================
Route::prefix('admin')->name('admin.')->middleware('auth', 'role:admin')->group(function() {
    Route::redirect('/', '/admin/products');
    Route::resource('products', ProductController::class);
    Route::get('products/{id}/clone', [ProductController::class, 'clone'])->name('products.clone');
});

// ====================================== AUTHENTICATION ================================================
Route::get('/login', [LoginController::class, 'index'])->name('login'); // this is to support laravel auth middleware redirection
Route::prefix('auth')->name('auth.')->group(function() {
    Route::controller(LoginController::class)->name('login.')->group(function() {
        Route::get('/login', 'index')->name('index');
        Route::post('/login', 'login')->name('login');
        Route::post('/logout', 'logout')->name('logout');
    });

    Route::controller(RegisterController::class)->name('register.')->group(function() {
        Route::get('/register', 'index')->name('index');
        Route::post('/register', 'store')->name('store');
    });
});

// ==================================== PUBLIC PRODUCTS  ==============================================
Route::controller(ProductController::class)->name('products.')->prefix('products')->group(function() {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/{product}', 'edit')->name('edit');
    Route::put('/{product}', 'update')->name('update');
});
