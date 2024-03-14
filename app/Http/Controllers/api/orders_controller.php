<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\order_history;
use App\Models\order_item;
use App\Models\payment;
use App\Models\products;
use App\Models\notifications;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class orders_controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }
    
    public function index(){
        if(Auth::user()->user_type == 'buyer'){
            $orders = order_history::where('user_id', Auth::user()->id)->get();
            $productDescription = products::whereIn('id', $orders->pluck('order_id'))->get();
            return response()->json(['order' => $orders, 'descriptions' => $productDescription]);
        } else {
            return response()->json(['message' => 'You are not a buyer']);
        }
    }

    public function store(Request $request){

        $product = products::find($request->id);
        $request->validate([
            'message'
        ]);

        $product->update([
            'availability' => 'to ship',
            'quantity' => $product->quantity - 1,
            'message' => $request->input('message')

        ]);

        $request -> validate([
            'payment' => 'required'
        ]);
        $payment_method = $request->input('payment');

        $payment = payment::create([
            'user_id' => Auth::user()->id,
            'payment_method' => $payment_method,
            'payment_status' => 'to be paid'
        ]);

        order_history::create([
            'buyer_id' => Auth::user()->id,
            'total_amount' => $product->price,
            'payment_id' => $payment->id,
            'status' => 'to ship',
            'seller_id' => $product->user_id,
            'product_id' => $product->id
        ]);

        notifications::create([
            'user_id' => $product->user_id,
            'message' => 'Your product has been sold'
        ]);

        notifications::create([
            'user_id' => Auth::user()->id,
            'message' => 'You have successfully placed an order'
        ]);

        if($product->quantity == 0){
            $product->update([
                'availability' => 'out of stock'
            ]);
        }
        else {
            $product->update([
                'availability' => 'approved',
            ]);
        }

        return response()->json(['message' => 'Order placed']); 
    }

    public function orderCancel(Request $request){
        $order = order_history::find($request->order_id);
        $products = products::find($order->product_id);

        $order->update([
            'status' => 'cancelled'
        ]);
    
        $products->update([
            'availability' => 'approved',
            'quantity' => $products->quantity + 1
        ]);
    
        notifications::create([
            'user_id' => $products->user_id,
            'message' => 'Your product order has been cancelled'
        ]);
    
        notifications::create([
            'user_id' => Auth::user()->id,
            'message' => 'You have successfully cancelled an order'
        ]);

        return response()->json(['message' => 'Order cancelled']);
    }

    function orderSettled(Request $request){
        $order = order_history::find($request->product_id);
        $product = products::find($order->product_id);

        $order->update([
            'status' => 'sold'
        ]);

        notifications::create([
            'user_id' => $product->user_id,
            'message' => 'Your product order has settled'
        ]);

        notifications::create([
            'user_id' => Auth::user()->id,
            'message' => 'You have successfully settled an order'
        ]);

        return response()->json(['message' => 'Order settled']);
    }

    public function buyerProfile(){
        $orderHistory = order_history::where('buyer_id', Auth::user()->id)->first();
        $productDetails = products::join('order_histories', 'products.id', '=', 'order_histories.product_id')
        ->join('user_table', 'order_histories.seller_id', '=', 'user_table.id')
        ->where('products.id', $orderHistory->product_id)
        ->select('products.*', 'order_histories.status', 'order_histories.id as order_id' , 'user_table.first_name as seller_name', 'user_table.last_name as seller_lastname')
        ->get();

        return response()->json($productDetails);
    }

    public function sellerProfile(){
        $orderHistory = order_history::where('seller_id', Auth::user()->id)->first();
        $productDetails = products::join('order_histories', 'products.id', '=', 'order_histories.product_id')
        ->join('user_table', 'order_histories.buyer_id', '=', 'user_table.id')
        ->where('products.id', $orderHistory->product_id)
        ->select('products.*', 'order_histories.status', 'order_histories.id as order_id' , 'user_table.first_name as buyer_name', 'user_table.last_name as buyer_lastname')
        ->get();
        return response()->json($productDetails);
    }

    public function sellerProducts(){
        $products = products::where('user_id', Auth::user()->id)->get();
        return response()->json($products);
    }
}
