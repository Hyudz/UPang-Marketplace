<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationManager;

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


Route::get("/signup",[AuthenticationManager::class,'signup']) -> name('signup');  
Route::get("/homepage",[AuthenticationManager::class,'homepage']) -> name('homepage');
Route::get("/login",[AuthenticationManager::class,'login']) -> name('login');

Route::get("/products",function() {
    return view('product');
}) -> name('products');

Route::get("/profile",function() {
    return view('profile');
}) -> name('profile');

Route::get("/settings",function() {
    return view('settings');
}) -> name('settings');

Route::get("/endsession",function() {
    return redirect('login');
}) -> name('logout');

Route::get("/cart",function() {
    return view('cart');
}) -> name('cart');

Route::get("/saved",function() {
    return view('saved');
}) -> name('saved');

Route::get("/product",function() {
    return view('product');
}) -> name('product');

Route::get("/editprofile",function() {
    return view('editprofile');
}) -> name('edit-profile');

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

Route::get("/viewproduct",function() {
    return view('viewproduct');
}) -> name('viewproduct');

Route::get("/buy",function() {
    return view('check-out');
}) -> name('checkout-item');

Route::get("/confirmed",function() {
    return view('purchased');
}) -> name('purchase');