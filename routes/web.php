<?php

use App\Models\User;

use App\Models\Role;
use Auth\LoginController;
use Admin\ProductController;
use App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;


Route::get('/', [HomeController::class, 'index']);
// ==========================================================================================================================================================
// ADMINISTRATION
Route::prefix('admin')->name('admin.')->middleware('auth', )->group(function() {
    Route::redirect('/', '/admin/products')->middleware('role:admin');
    Route::resource('products', Admin\ProductController::class);
});

// ==========================================================================================================================================================

// ==========================================================================================================================================================
// AUTHENTIFICATION CLIENT
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// ==========================================================================================================================================================

// Route::get('/products', [Admin\ProductController::class, 'index'])->name('products.index');
    // Route::get('/products/create', [Admin\ProductController::class, 'create'])->name('products.create');
    // Route::post('/products', [Admin\ProductController::class, 'store'])->name('products.store');
    // Route::get('/products/{product}', [Admin\ProductController::class, 'edit'])->name('products.edit');
    // Route::put('/products/{product}', [Admin\ProductController::class, 'update'])->name('products.update');