<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationManager;
use App\Http\Controllers\marketplace;
use App\Http\Controllers\webpage_controller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('login');
});


Route::get("/signup",[marketplace::class,'signup']) -> name('signup');  
Route::get("/login",[marketplace::class,'login']) -> name('login');
Route::post("/login",[marketplace::class,'login_post']) -> name('login-post');
Route::post("/create_user",[marketplace::class,'create_user']) -> name('create-user');
Route::post("/admin/login",[marketplace::class,'adminlogin_post']) -> name('admin.login');

Route::get("/homepage",[webpage_controller::class,'homepage']) -> name('homepage') -> middleware('login');
Route::get("/profile",[webpage_controller::class,'profile']) -> name('profile');
Route::get("/settings",[webpage_controller::class,'settings']) -> name('settings');
Route::get("/endsession",[webpage_controller::class,'logout']) -> name('logout');
Route::get("/cart",[webpage_controller::class,'cart']) -> name('cart');
Route::get("/product",[webpage_controller::class,'product']) -> name('product');
Route::get("/viewproduct/{id}",[webpage_controller::class,'viewproduct'])->name('viewproduct');
Route::get("/likes",[webpage_controller::class,'likes']) -> name('likes');
Route::post("/viewproduct/{id}",[webpage_controller::class,'save_item'])->name('save_item');
Route::post("sell_product", [webpage_controller::class,'create_product'])->name('sell.product');
Route::post("/viewproducts/{id}",[webpage_controller::class,'add_like'])->name('add_like');

Route::get("/admin/signin",function() {
    return view('admin.signin');
}) -> name('admin-signin');

Route::get("/admin/dashboard",function() {
    return view('admin.dashboard');
}) -> name('admin.Sdashboard');

Route::get("/forgotpassword",function() {
    return view('forgotpassword');
}) -> name('forgotpassword');

Route::get("/sell",function() {
    return view('sell');
}) -> name('sell');

Route::get("/buy",function() {
    return view('check-out');
}) -> name('checkout-item');

Route::get("/confirmed",function() {
    return view('purchased');
}) -> name('purchase');

Route::get("/admin",function() {
    return view('admin');
}) -> name('admin');