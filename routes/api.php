<?php

use App\Http\Controllers\Api\ApiProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix' => 'v1/', 'as' => 'product.'], function () {
    Route::get('/getProduct', [ApiProductController::class, 'index']);
    Route::get('/getTrash', [ApiProductController::class, 'trash']);
    Route::post('/createProduct', [ApiProductController::class, 'store']);
    Route::put('/updateProduct/{slug}', [ApiProductController::class, 'update']);
    Route::delete('/deleteProduct/{product}', [ApiProductController::class, 'destroy']);
    Route::delete('/softDelete/{slug}', [ApiProductController::class, 'softDestroy']);
    Route::get('/restore/{slug}', [ApiProductController::class, 'restore']);
    Route::get('/deleteTrash/{slug}', [ApiProductController::class, 'deleteTrasher']);
});
