<?php

use App\Http\Controllers\Api\GetController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(["prefix" => 'v1/', "as" => "product."], function () {
    Route::get('/getProduct', [GetController::class, 'index']);
    Route::post('/createProduct', [GetController::class, 'store']);
    Route::put('/updateProduct/{id}', [GetController::class, 'update']);
    Route::delete('/deleteProduct/{product}', [GetController::class, 'destroy']);
});
