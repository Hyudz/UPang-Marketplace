<?php

use App\Http\Controllers\api\marketplace_api;
use App\Http\Controllers\api\products_controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\user_controller;
use App\Http\Controllers\api\likes_api;


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('/login',[marketplace_api::class,'login']);
Route::post('/register',[marketplace_api::class,'signup']);
Route::apiResource('users', user_controller::class);
Route::apiResource('likes', likes_api::class);
Route::apiResource('products', products_controller::class);

Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::post('/add_to_cart',[marketplace_api::class,'add_to_cart']);
    Route::post('/remove_from_cart',[marketplace_api::class,'remove_from_cart']);
    Route::post('/checkout',[marketplace_api::class,'checkout']);
    Route::post('/logout',[marketplace_api::class,'logout']);
});
