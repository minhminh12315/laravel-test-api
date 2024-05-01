<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;


// Route::get('/', function () {
//     return view('homepage');
// });

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/login', [AdminController::class, 'login'])->name('login');
Route::post('/login', [AdminController::class, 'auth'])->name('login.auth');
Route::get('/register', [AdminController::class, 'register'])->name('register');
Route::post('/register', [AdminController::class, 'store'])->name('register.store');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function(){
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/product', [AdminController::class, 'index'])->name('admin.product');
    Route::get('/product/addnew', [ProductController::class, 'addnew'])->name('admin.product.addnew');
    Route::post('/product/addnew', [ProductController::class, 'store'])->name('admin.product.store');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
    Route::post('/product/edit/{id}', [ProductController::class, 'update'])->name('admin.product.update');
    Route::get('/product/delete/{id}', [ProductController::class, 'delete'])->name('admin.product.delete');
    Route::get('/token/create', [AdminController::class, 'createToken'])->name('admin.token.create');
    Route::post('/token/create', [AdminController::class,'storeToken'])->name('admin.token.store');
});

