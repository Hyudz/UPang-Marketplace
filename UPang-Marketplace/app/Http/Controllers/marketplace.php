<?php

namespace App\Models;
namespace App\Http\Controllers;

use App\Models\products;
use App\Models\user_table;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class marketplace extends Controller
{
    function signUp(){
        return view('signup');
    }

    function homepage(){ 
        $username = Auth::user()->first_name;
        return view('welcome',['username' => $username]);
    }

    function products(){
        $username = Auth::user()->first_name;
        return view('product', ['username' => $username]);
    }

    function profile(){
        $username = Auth::user()->first_name;
        return view('profile', ['username' => $username]);
    }

    function settings(){
        $username = Auth::user()->first_name;
        return view('settings', ['username' => $username]);
    }

    function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    function viewproduct(){
        $username = Auth::user()->first_name;
        return view('viewproduct', ['username' => $username]);
    }

    function cart(){
        $username = Auth::user()->first_name;
        return view('cart', ['username' => $username]);
    }

    function saved(){
        $username = Auth::user()->first_name;
        return view('saved', ['username' => $username]);
    }

    function product(){
        $username = Auth::user()->first_name;
        $products = DB::table('product')->get();
        return view('product', ['username' => $username], ['products' => $products]);
    }

    function editprofile(){
        $username = Auth::user()->first_name;
        return view('editprofile', ['username' => $username]);
    }

    function likes(){
        $username = Auth::user()->first_name;
        return view('likes', ['username' => $username]);
    }

    function login() {
        return view('login');
    }

    function login_post(Request $request){
        $request -> validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            //$request->session()->regenerate();
            return redirect()->intended(route('homepage'));
        }

        return redirect()->route('login')->with(['error' => 'Invalid credentials']);
    }

    function create_user(Request $request){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);
    
        $data['first_name'] = $request->first_name;
        $data['last_name'] = $request->last_name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
    
        $user = user_table::create($data);
        if ($user) {
            return redirect()->route('login')->with('success', 'User created successfully');
        } else {
            return redirect()->route('signup')->with('error', 'User not created');
        }
    }

    function create_product(Request $request){
        $request->validate([
            'product_name' => 'required',
            'product_description' => 'required',
            'product_price' => 'required',
            'product_category' => 'required',
            'product_quantity' => 'required',
        ]);
    
        $data['product_name'] = $request->product_name;
        $data['product_description'] = $request->product_description;
        $data['product_price'] = $request->product_price;
        $data['product_category'] = $request->product_category;
        $data['product_quantity'] = $request->product_quantity;
        $data['seller_id'] = Auth::user()->id;
    
        $product = products::create($data);
        if ($product) {
            return redirect()->route('product')->with('success', 'Product created successfully');
        } else {
            return redirect()->route('product')->with('error', 'Product not created');
        }
    }

    function adminlogin(){
        return view('admin.signin');
    }

    function adminlogin_post(Request $request){
        $request -> validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            //$request->session()->regenerate();
            return redirect()->intended(route('admin-dashboard'));
        }

        return redirect()->route('admin-signin')->with(['error' => 'Invalid credentials']);
    }

    function admin_dashboard(){
        return view('admin.dashboard');
    }
    
}
