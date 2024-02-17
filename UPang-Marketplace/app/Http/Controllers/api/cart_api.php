<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\cart_items;
use Illuminate\Support\Facades\Auth;

class cart_api extends Controller
{
    public function add(Request $request){
        $cart = cart_items::create([
            'user_id' => Auth::user()->id,
            'product_id' => $request->id,
            'quantity' => $request->quantity
        ]);
        return response()->json(['message' => 'Product added to cart']);
    }

    public function delete(Request $request){
        $cart = cart_items::where('user_id', Auth::user()->id)->where('product_id', $request->id)->first();
        $cart->delete();
        return response()->json(['message' => 'Product removed from cart']);
    }
}
