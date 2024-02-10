<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationManager;
use App\Http\Controllers\marketplace;

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
Route::get("/homepage",[marketplace::class,'homepage']) -> name('homepage');
Route::get("/login",[marketplace::class,'login']) -> name('login');
Route::post("/login",[marketplace::class,'login_post']) -> name('login-post');
Route::post("/create_user",[marketplace::class,'create_user']) -> name('create-user');
Route::get("/profile",[marketplace::class,'profile']) -> name('profile');
Route::get("/settings",[marketplace::class,'settings']) -> name('settings');
Route::get("/endsession",[marketplace::class,'logout']) -> name('logout');
Route::get("/cart",[marketplace::class,'cart']) -> name('cart');
Route::get("/saved",[marketplace::class,'saved']) -> name('saved');
Route::get("/product",[marketplace::class,'product']) -> name('product');
Route::get("/viewproduct",[marketplace::class,'viewproduct']) -> name('viewproduct');
Route::post("/admin/login",[marketplace::class,'adminlogin_post']) -> name('admin.login');
Route::post("/sell.product",[marketplace::class,'create_product']) -> name('sell.product');


Route::get("/editprofile",function() {
    return view('editprofile');
}) -> name('edit-profile');

Route::get("/admin/signin",function() {
    return view('admin.signin');
}) -> name('admin-signin');

Route::get("/admin/dashboard",function() {
    return view('admin.dashboard');
}) -> name('admin.Sdashboard');

Route::get("/likes",function() {
    return view('likes');
}) -> name('likes');

Route::get("/home",function() {
    return redirect('homepage');
}) -> name('home');

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