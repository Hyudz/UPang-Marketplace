<?php

use App\Http\Controllers\api\Admin_api_controller;
use App\Http\Controllers\api\cart_api;
use App\Http\Controllers\api\marketplace_api;
use App\Http\Controllers\api\products_controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\user_controller;
use App\Http\Controllers\api\likes_api;
use App\Http\Controllers\api\notifications_api;
use App\Http\Controllers\api\orders_controller;
use App\Http\Controllers\api\product_approval;
use App\Http\Controllers\api\messages_api;
use App\Http\Controllers\webpage_controller;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('/login',[marketplace_api::class,'login']);
Route::post('/register',[marketplace_api::class,'signup']);
Route::apiResource('users', user_controller::class);

Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::post('/logout',[marketplace_api::class,'logout']);
    // Route::get('/likes',[likes_api::class,'index']);
    // Route::post('/likes/add',[likes_api::class,'store']);
    // Route::delete('/likes/remove',[likes_api::class,'destroy']);
    Route::get("/cart", [cart_api::class,'index']);
    Route::post("/purchase", [orders_controller::class,'store']);
    Route::delete("/remove_from_cart", [cart_api::class,'destroy']);
    Route::post("/add_to_cart", [cart_api::class,'store']);
    Route::get('/orderBuyer', [orders_controller::class, 'buyerProfile']);
    Route::get('/notifications',[notifications_api::class,'index']);
    // Route::get("/message",[messages_api::class,'index']);
    // Route::post("/message_send",[messages_api::class,'store']);
    // Route::delete("/message_delete/{id}",[messages_api::class,'destroy']);
    Route::post("/getSeller", [products_controller::class,'getSeller']);
    Route::get("/getBuyer", [products_controller::class,'getBuyer']);
    Route::post("/cancelOrder", [orders_controller::class, 'orderCancel']);
    Route::post("/orderSettled", [orders_controller::class, 'orderSettled']);
    Route::get("/buyerProfile", [orders_controller::class, 'buyerProfile']);
    Route::get("/sellerProfile", [orders_controller::class, 'sellerProfile']);
    Route::delete("/deleteProduct/{id}",[products_controller::class,'destroy']);
    Route::put("/updateProduct/{id}",[products_controller::class,'update']);
    Route::put("/updateProfile/{id}",[user_controller::class,'update']);
});
Route::get('/product',[products_controller::class,'show'])->middleware('auth:sanctum');
Route::post('/admin/signin',[Admin_api_controller::class,'signin']);
Route::get('/admin/dashboard',[Admin_api_controller::class,'index']);
Route::get('/getData',[user_controller::class,'getData']);
