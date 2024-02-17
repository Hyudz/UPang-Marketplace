<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\marketplace;
use App\Http\Controllers\seller_product;
use App\Http\Controllers\webpage_controller;

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
Route::get("/viewproduct/{id}",[webpage_controller::class,'viewproduct'])->name('viewproduct') -> middleware('product');
Route::get("/likes",[webpage_controller::class,'likes']) -> name('likes');
Route::post("/viewproduct/{id}",[webpage_controller::class,'save_item'])->name('save_item');
Route::post("sell_product", [webpage_controller::class,'create_product'])->name('sell.product');
Route::get("/sell",[webpage_controller::class,'sell']) -> name('sell');
Route::post("/viewproducts/{id}",[webpage_controller::class,'add_like'])->name('add_like');
Route::get("/my_profile",[webpage_controller::class,'my_profile']) -> name('buyer_profile');
Route::post("/confirmed/{id}",[webpage_controller::class,'purchase']) -> name('purchased');
Route::get("/check-out/{id}",[webpage_controller::class,'purchase']) -> name('checkout-item');
Route::get("/not_found",[webpage_controller::class,'notfound']) -> name('not_found');



Route::get("/analytics/{id}",[seller_product::class,'analytics']) -> name('analytics');
Route::post("/delete/{id}",[seller_product::class,'delete']) -> name('delete_product');
Route::post("/update/{id}",[seller_product::class,'update']) -> name('update_product');
Route::get("/edit/{id}",[seller_product::class,'edit']) -> name('edit_product');

Route::get("/admin/signin",function() {
    return view('admin.signin');
}) -> name('admin-signin');

Route::get("/admin/dashboard",function() {
    return view('admin.dashboard');
}) -> name('admin.Sdashboard');

Route::get("/forgotpassword",function() {
    return view('forgotpassword');
}) -> name('forgotpassword');

Route::get("/admin",function() {
    return view('admin');
}) -> name('admin');