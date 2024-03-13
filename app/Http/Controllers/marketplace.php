<?php

namespace App\Http\Controllers;

use App\Models\user_table;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\products;
use Illuminate\Support\Facades\DB;
use App\Models\order_history;



class marketplace extends Controller
{
    function signUp(){
        return view('signup');
    }

    function login() {
        return view('login');
    }

    function preview(Request $request){
        $product = products::where('id', '=', $request->id)->first();
        $similar = products::where('id', '!=', $product->id)
        ->where('availability', 'approved')
        ->inRandomOrder()
        ->get();
        return view('viewproduct2', ['product' => $product, 'similar' => $similar]);
    }

    function landing(){
        $products = DB::table('products')->where('availability', 'approved')
        ->get();
        return view('landing', ['products' => $products]);
    }

    function login_post(Request $request){
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($credentials)) {
            if (Auth::user()->user_type != 'admin') {
                $products = DB::table('products')->where('availability', 'approved')
                ->where('user_id', '!='  ,Auth::user()->id)
                ->get();
                $usertype = Auth::user();
                $notifications = DB::table('notifications')->where('user_id', Auth::user()->id)->get();
                return redirect()->route('homepage',['usertype' => $usertype, 'notifications' => $notifications, 'products' => $products]);
            } else {
                return redirect()->route('login')->with('error', 'Admin account should not be allowed in client login');
                $products = collect();
            }
        }
        return redirect()->route('login')->with(['error' => 'Invalid email or password']);
        $products = collect();
    }

    function searchItem2(Request $request){
        $request->validate([
            'search' => 'required|string|max:255',
        ]);
    
        $search = $request->input('search');

        $products = products::where('name', 'like', '%' . $search . '%')
            ->where('availability', 'approved')
            ->paginate(10);

        return view('landing',['products' => $products]);
        }

    function create_user(Request $request){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:user_table,email',
            'password' => 'required|confirmed',
            'user_type' => 'required',
            'birthday' => 'required',
            "user_type" => "required|in:seller,buyer",
            "gender" => "required|in:male,female",
            "birthday" => "required|date",
            "adress" => "required",
            "contactNo" => "required"
        ]);
    
        $data['first_name'] = $request->first_name;
        $data['last_name'] = $request->last_name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['user_type'] = $request->user_type;
        $data['gender'] = $request->gender;
        $data['birthday'] = $request->birthday;
        $data['address'] = $request->address;
        $data['contactNo'] = $request->contactNo;

        if($request->email)
    
        $user = user_table::create(
            $data['email'],
            $data['password']
        );


        // if ($user) {
        //     $credentials = [
        //         'email' => $request->input('email'),
        //         'password' => $request->input('password'),
        //     ];
    
        //     if (Auth::attempt($credentials)) {
        //         $products = DB::table('products')->where('availability', 'approved')
        //         ->where('user_id', '!='  ,Auth::user()->id)
        //         ->get();
        //         $usertype = Auth::user();
        //         $notifications = DB::table('notifications')->where('user_id', Auth::user()->id)->get();
        //         return redirect()->route('homepage',['usertype' => $usertype, 'notifications' => $notifications, 'products' => $products]);
        //     }
        // } else {
        //     return redirect()->route('signup')->with('error', 'User not created');
        // }
    }

    function adminlogin(){
        return view('admin.signin');
    }

    function adminlogin_post(Request $request){
        $credentials = [
            'email' => $request->input('username'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($credentials)){

            if (Auth::user()->user_type == 'admin') {
                $product = products::all()->where('availability', 'under_review');
                $all_products = products::all();
                $users = user_table::all();
                $historyStatus = order_history::all();
                // $sellerName = user_table::all()->where('id', $product->user_id)->first();
                return redirect()->route('admin.dashboard', ['products' => $product, 'all_products' => $all_products, 'users' => $users, 'historyStatus' => $historyStatus]);
            } else {
                return redirect()->route('admin-signin')->with('error', 'Unauthorized access');
            }
        }

        return redirect()->route('admin-signin')->with(['error' => 'Invalid email or password']);
    }

    function admin_dashboard(){
        return view('admin.dashboard');
    }
    
}
