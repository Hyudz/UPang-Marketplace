<?php

namespace App\Http\Controllers\api;

use App\Models\products;
use App\Models\user_table;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class marketplace_api extends Controller
{
    function login(Request $request) {
        $email = $request->input('email');
        $password = $request->input('password');
        $user = user_table::where('email', $email)->first();
        if ($user) {
            if (Hash::check($password, $user->password)) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Login successful',
                    'data' => $user
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Invalid password'
                ]);
            }
        } else {
            return response()->json([
                'status' => 'error',
                'message' => $email,$password,$user,' does not exist'
            ]);
        }
    }

    function signup(Request $request) {
        $data['first_name'] = $request->input('first_name');
        $data['last_name'] = $request->input('last_name');
        $data['email'] = $request->input('email');
        $data['password'] = Hash::make($request->input('password'));
        $data['user_type'] = $request->input('user_type');
        $data['gender'] = $request->input('gender');
        $data['birthday'] = $request->input('birthday');
        $user = user_table::create($data);
        if ($user) {
            return response()->json([
                'status' => 'success',
                'message' => 'User created successfully',
                'data' => $user
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'User not created'
            ]);
        }
    }

    function sell_product(Request $request){
        $data['product_name'] = $request->input('product_name');
        $data['product_description'] = $request->input('product_description');
        $data['product_price'] = $request->input('product_price');
        $data['product_quantity'] = $request->input('product_quantity');
        $data['product_category'] = $request->input('product_category');

        $user = Auth::guard('api')->user();

        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not authenticated',
            ], 401); // Return a 401 Unauthorized status
        }
        $data['seller_id'] = $user->id;
        
        $product = products::create($data);
        if ($product) {
            return response()->json([
                'status' => 'success',
                'message' => 'Product created successfully',
                'data' => $product
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Product not created'
            ]);
        }
    }

    function display_products(){
        $products = products::all();
        return response()->json([
            'status' => 'success',
            'message' => 'Products retrieved successfully',
            'data' => $products
        ]);
    }
}
