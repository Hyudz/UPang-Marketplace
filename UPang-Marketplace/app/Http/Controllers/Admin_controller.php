<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\notifications;
use App\Models\order_history;
use App\Models\user_table;
use Illuminate\Support\Facades\Auth;

class Admin_controller extends Controller
{
    public function __construct()
    {
        $this->middleware('login');
    }

    public function dashboard(){
        $product = products::all()->where('availability', 'under_review');
        $all_products = products::all();
        $users = user_table::all();
        $historyStatus = order_history::all();
        return view('admin.dashboard',['products' => $product, 'all_products' => $all_products, 'users' => $users, 'historyStatus' => $historyStatus]);
    }

    public function signin(){
        return view('admin.signin');
    }

    public function approve(Request $request){

        $product_id = $request->id;

        products::where('id', $product_id)->update([
            'availability' => 'approved'
        ]);

        $product = products::all()->where('availability', 'under_review');
        $all_products = products::all();
        $products = products::find($product_id);

        notifications::create([
            'user_id' => $products->user_id,
            'message' => "Your product {$products->name}  has been approved"
        ]);
        
        return redirect()->route('admin.dashboard', ['products' => $product, 'all_products' => $all_products]);
    }

    public function decline(Request $request){
        $product_id = $request->id;
        products::where('id', $product_id)->update([
            'availability' => 'declined'
        ]);

        $product = products::all()->where('availability', 'under_review');
        $products = products::find($product_id);
        notifications::create([
            'user_id' => $products->user_id,
            'message' => "Your product {$products->name} was not approved."
        ]);

        $all_products = products::all();
        return redirect()->route('admin.dashboard', ['products' => $product, 'all_products' => $all_products]);
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('admin.signin');
    }


}
