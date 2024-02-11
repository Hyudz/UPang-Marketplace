<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class webpage_controller extends Controller
{

    public function __construct()
    {
        $this->middleware('login');
    }

    function homepage(){ 
        return view('welcome');
    }

    function products(){
        return view('product');
    }

    function profile(){
        return view('profile');
    }

    function settings(){
        return view('settings');
    }

    function viewproduct(Request $request){
        $product = products::with('user')->find($request->id);
        return view('viewproduct', ['product' => $product]);
    }

    function cart(){
        return view('cart');
    }

    function saved(){
        return view('saved');
    }

    function product(){
        $products = DB::table('products')->get();
        return view('product', ['products' => $products]);
    }

    function editprofile(){
        return view('editprofile');
    }

    function likes(){
        $likes = DB::table('likes_tables')->where('user_id', Auth::user()->id)->get();
        return view('likes',['likes'=>$likes]);
    }

    function add_like(Request $request){
        $data['user_id'] = Auth::user()->id;
        $data['product_id'] = $request->product_id;
        $like = DB::table('likes_tables')->create($data);
        if ($like) {
            return redirect()->route('product')->with('success', 'Product liked successfully');
        } else {
            return redirect()->route('product')->with('error', 'Product not liked');
        }
    }

    function remove_like(Request $request){
        $like = DB::table('likes')->where('product_id', $request->product_id)->delete();
        if ($like) {
            return redirect()->route('product')->with('success', 'Product unliked successfully');
        } else {
            return redirect()->route('product')->with('error', 'Product not unliked');
        }
    }

    function create_product(Request $request){
        $request->validate([
            'product_name' => 'required',
            'product_description' => 'required',
            'product_price' => 'required',
            'product_quantity' => 'required',
        ]);
    
        $data['name'] = $request->product_name;
        $data['description'] = $request->product_description;
        $data['price'] = $request->product_price;
        $data['quantity'] = $request->product_quantity;
        $data['user_id'] = Auth::user()->id;
    
        $product = products::create($data);
        if ($product) {
            return redirect()->route('product')->with('success', 'Product created successfully');
        } else {
            return redirect()->route('product')->with('error', 'Product not created');
        }
    }

    function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
