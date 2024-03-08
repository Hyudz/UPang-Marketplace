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
use App\Models\user_table;

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
            'quantity' =>  0,
            'message' => $request->input('message')

        ]);

        $order = order_item::create([
            'product_id' => $product->id,
            'quantity' => 1
        ]);

        $request -> validate([
            'payment' => 'required'
        ]);
        $payment_method = $request->input('payment');

        $payment = payment::create([
            'user_id' => Auth::user()->id,
            'order_id' => $order->id,
            'payment_method' => $payment_method,
            'payment_status' => 'to be paid'
        ]);

        order_history::create([
            'user_id' => Auth::user()->id,
            'order_id' => $order->id,
            'total_amount' => $product->price,
            'payment_id' => $payment->id,
            'status' => 'to ship'
        ]);

        notifications::create([
            'user_id' => $product->user_id,
            'message' => 'Your product has been sold'
        ]);

        notifications::create([
            'user_id' => Auth::user()->id,
            'message' => 'You have successfully placed an order'
        ]);

        return response()->json(['message' => 'Order placed']); 
    }

    public function orderCancel(Request $request){
        $order = order_history::find($request->order_id);
        $orderItem = order_item::find($order->id);
        $products = products::find($orderItem->product_id);
    
        $order->update([
            'status' => 'cancelled'
        ]);
    
        $product = products::find($products->id);
    
        $product->update([
            'availability' => 'approved',
            'quantity' => $product->quantity + 1
        ]);
    
        notifications::create([
            'user_id' => $product->user_id,
            'message' => 'Your product order has been cancelled'
        ]);
    
        notifications::create([
            'user_id' => Auth::user()->id,
            'message' => 'You have successfully cancelled an order'
        ]);

        return response()->json(['message' => 'Order cancelled']);
    }

    function orderSettled(Request $request){
        $product = products::find($request->product_id);
        $orderItem = order_item::where('product_id', $product->id)->first();
        $order = order_history::where('order_id', $orderItem->id)->first();

        $order->update([
            'status' => 'paid'
        ]);
    
        $product->update([
            'availability' => 'sold',
        ]);

        notifications::create([
            'user_id' => $product->user_id,
            'message' => 'Your product order has been settled'
        ]);

        notifications::create([
            'user_id' => Auth::user()->id,
            'message' => 'You have successfully settled an order'
        ]);

        return response()->json(['message' => 'Order settled']);
    }

    public function buyerProfile(){
        $productDetails = DB::table('order_histories')
        ->join('order_items', 'order_histories.order_id', '=', 'order_items.id')
        ->join('products', 'order_items.product_id', '=', 'products.id')
        ->where('order_histories.user_id', Auth::user()->id)
        ->select('products.*', 'order_histories.status', 'order_histories.id')
        ->get();

        return response()->json($productDetails);
    }

    public function sellerProfile(){
        $products = products::where('user_id', Auth::user()->id)->get();
        return response()->json($products);
    }
}
