<?php

use App\Http\Controllers\Api\V1\ApiV1PizzaOrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['prefix' => 'v1', 'middleware' => 'auth:sanctum'], function () {
    Route::get('orders/current', [ApiV1PizzaOrderController::class, 'current']);
    Route::put('orders/cancel/{order}', [ApiV1PizzaOrderController::class, 'cancel']);
    Route::apiResource('orders', ApiV1PizzaOrderController::class);
});
