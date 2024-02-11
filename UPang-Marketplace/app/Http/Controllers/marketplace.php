<?php

namespace App\Http\Controllers;

use App\Models\user_table;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class marketplace extends Controller
{
    function signUp(){
        return view('signup');
    }

    function login() {
        return view('login');
    }

    function login_post(Request $request){
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($credentials)) {
            // Authentication successful
            return redirect()->intended(route('homepage'));
        }

        return redirect()->route('login')->with(['error' => $credentials['password']]);
    }

    function create_user(Request $request){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'user_type' => 'required',
            'birthday' => 'required',
            "user_type" => "required|in:admin,seller,buyer",
            "gender" => "required",
            "birthday" => "required|date"

        ]);
    
        $data['first_name'] = $request->first_name;
        $data['last_name'] = $request->last_name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['user_type'] = $request->user_type;
        $data['gender'] = $request->gender;
        $data['birthday'] = $request->birthday;
    
        $user = user_table::create($data);
        if ($user) {
            return redirect()->route('login')->with('success', 'User created successfully');
        } else {
            return redirect()->route('signup')->with('error', 'User not created');
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
            return redirect()->intended(route('admin-dashboard'));
        }

        return redirect()->route('admin-signin')->with(['error' => 'Invalid credentials']);
    }

    function admin_dashboard(){
        return view('admin.dashboard');
    }
    
}
