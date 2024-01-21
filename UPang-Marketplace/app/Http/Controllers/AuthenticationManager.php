<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthenticationManager extends Controller
{
    function signUp(){
        return view('signup');
    }

    function homepage() {
        return view('welcome');
    }

    function login() {
        return view('login');
    }
}
