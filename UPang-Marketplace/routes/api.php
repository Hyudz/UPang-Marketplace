<?php

use App\Http\Controllers\api\marketplace_api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/login',[marketplace_api::class,'login'])->name('login');
Route::post('/signup',[marketplace_api::class,'signup'])->name('signup');
Route::post('/sell_product',[marketplace_api::class,'sell_product'])->name('sell_product');
Route::get('/products',[marketplace_api::class,'display_products'])->name('display_products');
