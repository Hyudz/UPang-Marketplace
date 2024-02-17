<?php

namespace App\Http\Controllers;

use App\Models\cart_items;
use App\Models\likes_table;
use App\Models\payment;
use Illuminate\Http\Request;
use App\Models\products;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\order_item;

class webpage_controller extends Controller
{

    public function __construct()
    {
        $this->middleware('login');
    }

    function homepage(){ 
        $usertype = Auth::user()->first_name;
        return view('welcome', ['usertype' => $usertype]);
    }

    function my_profile(){
        $usertype = Auth::user()->first_name;
        return view('buyer/profile_edit', ['usertype' => $usertype]);
    }

    function products(){
        $usertype = Auth::user()->first_name;
        return view('product',['usertype' => $usertype]);
    }

    function profile(){
        $usertype = Auth::user()->first_name;

        $products = products::where('user_id', Auth::user()->id)->get();
        return view('profile',['usertype' => $usertype], ['products' => $products]);
    }

    function settings(){
        return view('settings');
    }

    function sell(){
        $usertype = Auth::user()->first_name;
        return view('sell',['usertype' => $usertype]);
    }

    function viewproduct(Request $request){
        $usertype = Auth::user()->first_name;
        $product = products::with('user')->find($request->id);
        return view('viewproduct', ['product' => $product],['usertype' => $usertype]);
    }

    function cart(){
        $user_id = Auth::user()->id;
        $usertype = Auth::user()->first_name;
        $product = products::whereHas('cart_items', function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })->get();
        return view('cart',['products' => $product],['usertype' => $usertype]);
    }


    function save_item(Request $request){
        $user_id = Auth::user()->id;
        $product_id = $request->product_id;

        $saved = cart_items::where('user_id', $user_id)
        ->where('product_id',$product_id)
        ->exists();
        $usertype = Auth::user()->first_name;

        if($saved) {
            cart_items::where('user_id', $user_id)
            ->where('product_id',$product_id)
            ->delete();
        } else {
            cart_items::create([
                'user_id'=> $user_id,
                'product_id' => $product_id,
            ]);
        }
        return redirect()->route('product',['usertype' => $usertype])->with('success', 'Product added successfully');
    }

    function product(){
        $usertype = Auth::user()->first_name;
        $products = DB::table('products')->where('availability', 'approved')->get();
        return view('product', ['products' => $products],['usertype' => $usertype]);
    }

    function editprofile(){
        return view('editprofile');
    }

    function likes(){
        $usertype = Auth::user()->first_name;
        $user_id = Auth::user()->id;
        $product = products::whereHas('likes', function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })->get();
    
        return view('likes', ['products' => $product],['usertype' => $usertype]);
    }

    function add_like(Request $request){
        $user_id = Auth::user()->id;
        $product_id = $request->product_id;
    
        $likeExists = likes_table::where('user_id', $user_id)
            ->where('product_id', $product_id)
            ->exists();
    
        if ($likeExists) {
            likes_table::where('user_id', $user_id)
                ->where('product_id', $product_id)
                ->delete();
    
            return redirect()->route('product')->with('success', 'Product unliked successfully');
        } else {
            likes_table::create([
                'user_id' => $user_id,
                'product_id' => $product_id,
            ]);
    
            return redirect()->route('product')->with('success', 'Product liked successfully');
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

    function checkout(Request $request){
        $product = products::find($request->id);
        $usertype = Auth::user()->first_name;
        return view('check-out', ['product' => $product],['usertype' => $usertype]);
    }

    function purchase(Request $request){
        $product = products::find($request->id);

        $product->update([
            'availability' => 'sold',
            'quantity' => '0'
        ]);

        $order = order_item::create([
            'product_id' => $product->id,
            'quantity' => 1
        ]);

        $payment = payment::create([
            'user_id' => Auth::user()->id,
            'order_id' => $order->id,
            'payment_method' => 'cash',
            'payment_status' => 'paid'
        ]);

        DB::table('order_histories')->insert([
            'user_id' => Auth::user()->id,
            'order_id' => $order->id,
            'total_amount' => $product->price,
            'payment_id' => $payment->id,
            'status' => 'paid'
        ]);
        return redirect()->route('product')->with('success', 'Product purchased successfully');
    }

    function notfound(){
        return view('product_not_found');
    }
}
