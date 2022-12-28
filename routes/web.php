<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return redirect()->route('product.index');
// });
// Route::group(["prefix" => 'product', "as" => "product."], function () {
//     Route::get('/', [ProductController::class, 'index'])->name('index');
//     Route::get('/trash', [ProductController::class, 'trash'])->name('trash');
//     Route::get('/restore/{id}', [ProductController::class, 'restore'])->name('restore');
//     Route::get('/deleteTrasher/{id}', [ProductController::class, 'deleteTrasher'])->name('deleteTrasher');
//     Route::get('/create', [ProductController::class, 'create'])->name('create');
//     Route::post('/create', [ProductController::class, 'store'])->name('store');
//     Route::delete('/destroy/{slug}', [ProductController::class, 'destroy'])->name('destroy');
//     Route::delete('/softDestroy/{slug}', [ProductController::class, 'softDestroy'])->name('softDestroy');
//     Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('edit');
//     Route::put('/edit/{slug}', [ProductController::class, 'update'])->name('update');
// });

// Route::get('/login', [AccountController::class, 'login'])->name('login');
// Route::get('/register', [AccountController::class, 'register'])->name('register');
// Route::post('/createUser', [AccountController::class, 'createUser'])->name('createUser');
// Route::post('/loginUser', [AccountController::class, 'loginUser'])->name('loginUser');
// Route::get('/{any}', function () {
//     return view('post');
//   })->where('any', '.*');
Route::view('/{any}', 'app')->where('any', '.*');
