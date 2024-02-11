<?php

use App\Http\Controllers\api\marketplace_api;
use App\Http\Controllers\api\products_controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\user_controller;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/login',[marketplace_api::class,'login'])->name('login');
Route::apiResource('products', products_controller::class);
Route::apiResource('users', user_controller::class);

