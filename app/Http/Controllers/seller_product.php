<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class seller_product extends Controller
{
    public function __construct()
    {
        $this->middleware('analytics');
    }

    public function analytics(Request $request){
        $product = products::find($request->id);
        $usertype = Auth::user();
        $notifications = DB::table('notifications')->where('user_id', Auth::user()->id)->get();
        return view('seller/analytics', ['product' => $product, 'usertype' => $usertype, 'notifications' => $notifications]);
    }

    public function delete(Request $request){
        $product = Auth::user()->products->find($request->id);
        $product->cart_items()->delete();
        $product->likes()->delete();
        $product->delete();
        return redirect()->route('profile');
    }

    public function edit(Request $request){
        $product = products::find($request->id);
        return view('seller/update_product', ['product' => $product]);
    }

    public function update(Request $request){
        $product = products::find($request->id);
        $product -> update([
            'name' => $request->product_name,
            'price' => $request->product_price,
            'description' => $request->product_description,
            'category' => $request->product_category,
            'quantity' => $request->product_quantity,
        ]);
        return redirect()->route('profile');
    }
}
