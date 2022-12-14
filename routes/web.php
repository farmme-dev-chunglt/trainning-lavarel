<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('product.index');
});
Route::group(["prefix" => 'product', "as" => "product."], function () {
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::get('/trash', [ProductController::class, 'trash'])->name('trash');
    Route::get('/restore/{id}', [ProductController::class, 'restore'])->name('restore');
    Route::get('/deleteTrasher/{id}', [ProductController::class, 'deleteTrasher'])->name('deleteTrasher');
    Route::get('/create', [ProductController::class, 'create'])->name('create');
    Route::post('/create', [ProductController::class, 'store'])->name('store');
    Route::delete('/destroy/{product}', [ProductController::class, 'destroy'])->name('destroy');
    Route::delete('/softDestroy/{product}', [ProductController::class, 'softDestroy'])->name('softDestroy');
    Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('edit');
    Route::put('/edit/{product}', [ProductController::class, 'update'])->name('update');
});
