<?php

namespace App\Http\Controllers;

use App\Models\cart_items;
use App\Models\likes_table;
use App\Models\order_history;
use App\Models\payment;
use Illuminate\Http\Request;
use App\Models\products;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\order_item;
use App\Models\notifications;

class webpage_controller extends Controller
{

    public function __construct()
    {
        $this->middleware('login');
    }

    function homepage(){ 
        $usertype = Auth::user();
        $products = DB::table('products')->where('availability', 'approved')
        ->where('user_id', '!='  ,Auth::user()->id)
        ->get();
        $notifications = DB::table('notifications')->where('user_id', Auth::user()->id)->get();
        return view('welcome', ['usertype' => $usertype, 'notifications' => $notifications, 'products' => $products]);
    }

    function notifDetails(Request $request){
        $usertype = Auth::user();
        $notification = notifications::find($request->id);
        $notifications = DB::table('notifications')->where('user_id', Auth::user()->id)->get();
        return view('notif', ['notification' => $notification,'usertype' => $usertype, 'notifications' => $notifications]);
    }

    function my_profile(){
        $usertype = Auth::user();
        $notifications = DB::table('notifications')->where('user_id', Auth::user()->id)->get();
        return view('buyer/profile_edit', ['usertype' => $usertype, 'notifications' => $notifications]);
    }

    function products(){
        $usertype = Auth::user();
        return view('product',['usertype' => $usertype]);
    }

    function profile(){
        $usertype = Auth::user();

        $products = products::where('user_id', Auth::user()->id)->get();
        $notifications = DB::table('notifications')->where('user_id', Auth::user()->id)->get();
        return view('profile',['usertype' => $usertype, 'products' => $products, 'notifications' => $notifications]);
    }

    function settings(){
        return view('settings');
    }

    function sell(){
        $usertype = Auth::user();
        return view('sell',['usertype' => $usertype]);
    }

    function viewproduct(Request $request){
        $usertype = Auth::user();
        $product = products::with('user')->find($request->id);
        $notifications = DB::table('notifications')->where('user_id', Auth::user()->id)->get();
        return view('viewproduct', ['product' => $product,'usertype' => $usertype, 'notifications' => $notifications]);
    }

    function cart(){
        $user_id = Auth::user()->id;
        $usertype = Auth::user();
        $product = products::whereHas('cart_items', function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })->get();
        $notifications = DB::table('notifications')->where('user_id', Auth::user()->id)->get();
        return view('cart',['products' => $product,'usertype' => $usertype, 'notifications' => $notifications]);
    }


    function save_item(Request $request){
        $user_id = Auth::user()->id;
        $product_id = $request->product_id;
        $notifications = DB::table('notifications')->where('user_id', Auth::user()->id)->get();

        $saved = cart_items::where('user_id', $user_id)
        ->where('product_id',$product_id)
        ->exists();
        $usertype = Auth::user();

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
        return redirect()->route('product',['usertype' => $usertype, 'notifications' => $notifications])->with('success', 'Product added successfully');
    }

    function removeItem(Request $request){

        $product = $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);
        $notifications = DB::table('notifications')->where('user_id', Auth::user()->id)->get();
        $usertype = Auth::user();

        cart_items::where('user_id', Auth::user()->id)
        ->where('product_id', $product['product_id'])
        ->delete();

        return redirect()->route('cart',['usertype' => $usertype, 'notifications' => $notifications])->with('success', 'Product removed successfully');
    }

    function product(){
        $usertype = Auth::user();
        $products = DB::table('products')->where('availability', 'approved')
        ->where('user_id', '!='  ,Auth::user()->id)
        ->get();
        $notifications = DB::table('notifications')->where('user_id', Auth::user()->id)->get();
        return view('product', ['products' => $products,'usertype' => $usertype, 'notifications' => $notifications]);
    }

    function editprofile(){
        return view('editprofile');
    }

    function searchItem(Request $request){
        $usertype = Auth::user();
        $notifications = DB::table('notifications')->where('user_id', Auth::user()->id)->get();

        $request->validate([
            'search' => 'required|string|max:255',
        ]);
    
        $search = $request->input('search');

        $products = products::where('name', 'like', '%' . $search . '%')
            ->where('availability', 'approved')
            ->paginate(10);

        return view('product',['usertype' => $usertype, 'notifications' => $notifications, 'products' => $products]);
        }
    
    

    function likes(){
        $usertype = Auth::user();
        $notifications = DB::table('notifications')->where('user_id', Auth::user()->id)->get();
        $user_id = Auth::user()->id;
        $product = products::whereHas('likes', function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })->get();
    
        return view('likes', ['products' => $product,'usertype' => $usertype, 'notifications' => $notifications]);
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
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $data['name'] = $request->product_name;
        $data['description'] = $request->product_description;
        $data['price'] = $request->product_price;
        $data['quantity'] = $request->product_quantity;
        $data['user_id'] = Auth::user()->id;

        $file = $request->file('product_image');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move('uploads/products/', $filename);
        $data['image'] = $filename;
    
        products::create($data);

        $product = products::find($request->id);
        $notifications = DB::table('notifications')->where('user_id', Auth::user()->id)->get();
        $usertype = Auth::user();

        return redirect()->route('homepage', ['product' => $product,'usertype' => $usertype, 'notifications' => $notifications]);
    }

    function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    function checkout(Request $request){
        $product = products::find($request->id);
        $notifications = DB::table('notifications')->where('user_id', Auth::user()->id)->get();
        $usertype = Auth::user();
        return view('check-out', ['product' => $product,'usertype' => $usertype, 'notifications' => $notifications]);
    }

    function purchase(Request $request){
        $product = products::find($request->id);
        $buyer = Auth::user();
        return view('check-out', ['product' => $product, 'buyer' => $buyer]);
    }

    function purchased(Request $request){
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

        order_history::create([
            'user_id' => Auth::user()->id,
            'order_id' => $order->id,
            'total_amount' => $product->price,
            'payment_id' => $payment->id,
            'status' => 'paid'
        ]);

        notifications::create([
            'user_id' => $product->user_id,
            'message' => 'Your product has been sold'
        ]);

        notifications::create([
            'user_id' => Auth::user()->id,
            'message' => 'You have successfully placed an order'
        ]);
        return redirect()->route('product')->with('success', 'Product purchased successfully');
    }

    function notfound(){
        return view('product_not_found');
    }

}

