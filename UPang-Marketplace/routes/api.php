<?php

use App\Http\Controllers\api\Admin_api_controller;
use App\Http\Controllers\api\cart_api;
use App\Http\Controllers\api\marketplace_api;
use App\Http\Controllers\api\products_controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\user_controller;
use App\Http\Controllers\api\likes_api;
use App\Http\Controllers\api\notifications_api;
use App\Http\Controllers\api\orders_controller;
use App\Http\Controllers\api\product_approval;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('/login',[marketplace_api::class,'login']);
Route::post('/register',[marketplace_api::class,'signup']);
Route::apiResource('users', user_controller::class);
Route::apiResource('products', products_controller::class);

Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::post('/add_to_cart',[marketplace_api::class,'add_to_cart']);
    Route::post('/remove_from_cart',[marketplace_api::class,'remove_from_cart']);
    Route::post('/checkout',[marketplace_api::class,'checkout']);
    Route::post('/logout',[marketplace_api::class,'logout']);
    Route::get('/likes',[likes_api::class,'index']);
    Route::delete('/likes',[likes_api::class,'destroy']);
    Route::get("/cart", [cart_api::class,'index']);
    Route::delete("/cart", [cart_api::class,'destroy']);
    Route::post("/cart", [cart_api::class,'store']);
    Route::apiResource('/orders', orders_controller::class);
    Route::get('/notifications',[notifications_api::class,'index']);
    Route::get("/dashboard",[product_approval::class,'index']);
    Route::post("/approve",[product_approval::class,'approve']);
    Route::post("/decline",[product_approval::class,'decline']);
});

Route::post('/admin/signin',[Admin_api_controller::class,'signin']);
Route::get('/admin/dashboard',[Admin_api_controller::class,'index']);
