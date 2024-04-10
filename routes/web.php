<?php


use Admin\ProductController\Admin;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Authentication\LoginController;
use App\Http\Controllers\Authentication\RegisterController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');
// ==========================================================================================================================================================
// ADMINISTRATION
Route::prefix('admin')->name('admin.')->middleware('auth', 'role:admin')->group(function() {
    Route::redirect('/', '/admin/products');
    Route::resource('products', ProductController::class);
});

// ==========================================================================================================================================================

// ==========================================================================================================================================================
// AUTHENTIFICATION CLIENT
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');
// ==========================================================================================================================================================

// Route::get('/products', [Admin\ProductController::class, 'index'])->name('products.index');
    // Route::get('/products/create', [Admin\ProductController::class, 'create'])->name('products.create');
    // Route::post('/products', [Admin\ProductController::class, 'store'])->name('products.store');
    // Route::get('/products/{product}', [Admin\ProductController::class, 'edit'])->name('products.edit');
    // Route::put('/products/{product}', [Admin\ProductController::class, 'update'])->name('products.update');
