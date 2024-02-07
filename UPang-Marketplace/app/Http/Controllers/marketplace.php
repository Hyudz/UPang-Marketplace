<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\users;
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
    
        $user = users::create($data);
        if ($user) {
            return redirect()->route('login')->with('success', 'User created successfully');
        } else {
            return redirect()->route('signup')->with('error', 'User not created');
        }
    }
    
}
