<?php

use App\Http\Controllers\Api\VersionOne\ProductController;
use App\Http\Controllers\Api\VersionOne\ShoppingBasketController;
use App\Http\Controllers\Api\VersionOne\ShoppingBasketItemController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//api/v1/
Route::group(['prefix' => 'v1'], function(){
    Route::apiResource('products', ProductController::class);
    Route::apiResource('shoppingBaskets', ShoppingBasketController::class);
    Route::apiResource('shoppingBasketItems', ShoppingBasketItemController::class);
});