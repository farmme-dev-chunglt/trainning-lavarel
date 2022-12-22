<?php

use App\Http\Controllers\Api\GetController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix' => 'v1/', 'as' => 'product.'], function () {
    Route::get('/getProduct', [GetController::class, 'index']);
    Route::get('/getTrash', [GetController::class, 'trash']);
    Route::post('/createProduct', [GetController::class, 'store']);
    Route::put('/updateProduct/{slug}', [GetController::class, 'update']);
    Route::delete('/deleteProduct/{product}', [GetController::class, 'destroy']);
    Route::delete('/softDelete/{slug}', [GetController::class, 'softDestroy']);
    Route::get('/restore/{slug}', [GetController::class, 'restore']);
    Route::get('/deleteTrash/{slug}', [GetController::class, 'deleteTrasher']);
});
