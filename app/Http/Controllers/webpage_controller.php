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
use App\Models\user_table;
use Illuminate\Support\Facades\Hash;

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

    function deleteProfile(Request $request, $id){
        $user = user_table::find($id);
        $user->delete();
        return redirect()->route('login');
    }

    function notifDetails(Request $request){
        $usertype = Auth::user();
        $notification = notifications::find($request->id);
        $notifications = DB::table('notifications')->where('user_id', Auth::user()->id)->get();
        return view('notif', ['notification' => $notification,'usertype' => $usertype, 'notifications' => $notifications]);
    }

    function my_profile(){
        //BUYER PROFILE
        $usertype = Auth::user();
        $notifications = DB::table('notifications')->where('user_id', Auth::user()->id)->get();

        $productDetails = DB::table('order_histories')
        ->join('order_items', 'order_histories.order_id', '=', 'order_items.id')
        ->join('products', 'order_items.product_id', '=', 'products.id')
        ->where('order_histories.user_id', $usertype->id)
        ->select('products.*', 'order_histories.status', 'order_histories.id')
        ->get();  

        return view('buyer/profile_edit', ['usertype' => $usertype, 'notifications' => $notifications, 'productDetails' => $productDetails]);
    }

    function updateProfile(Request $request, $id){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        $userProfile = user_table::find($id);
    
        if (!Hash::check($request->password, Auth::user()->password)) {
            return redirect()->back()->with('error', 'Incorrect current password');
        }
    
        $userProfile->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->new_password),
        ]);
    
        return redirect()->route('buyer_profile')->with('success', 'Profile updated successfully');
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

        $similar = products::where('id', '!=', $product->id)
        ->where('availability', 'approved')
        ->inRandomOrder()
        ->get();
        return view('viewproduct', ['product' => $product,'usertype' => $usertype, 'notifications' => $notifications], ['similar' => $similar]);
    }

    function cart(){
        $user_id = Auth::user()->id;
        $usertype = Auth::user();
        $product = products::whereHas('cart_items', function ($query) use ($user_id) {
            $query->where('user_id', $user_id)
            ->where('availability', 'approved');
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

    function editProfile(){
        $userDetails = Auth::user();

        return view('editprofile', ['userDetails' => $userDetails]);
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
            'product_category' => 'required',
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $data['name'] = $request->product_name;
        $data['description'] = $request->product_description;
        $data['price'] = $request->product_price;
        $data['quantity'] = $request->product_quantity;
        $data['category'] = $request->product_category;
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
        $seller = user_table::find($product->user_id);
        return view('check-out', ['product' => $product, 'buyer' => $buyer, 'seller' => $seller]);
    }

    function purchased(Request $request){
        $product = products::find($request->id);

        $request->validate([
            'message'
        ]);

        $product->update([
            'availability' => 'to ship',
            'quantity' => $product->quantity - 1,
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
        return redirect()->route('product')->with('success', 'Product purchased successfully');
    }

    function cancelOrder(Request $request){
        $order = order_history::find($request->order_id);
        $orderItem = order_item::find($order->order_id);
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
    
        return redirect()->route('buyer_profile')->with('success', 'Order cancelled successfully');

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
            'message' => 'Your product order has p settled'
        ]);

        notifications::create([
            'user_id' => Auth::user()->id,
            'message' => 'You have successfully settled an order'
        ]);

        return redirect()->route('profile')->with('success', 'Order settled successfully');

    }

    function notfound(){
        return view('product_not_found');
    }

    function editProduct(Request $request){
        $product = products::find($request->id);
        return view('seller/update_product', ['product' => $product]);
    }

    function updateProduct(Request $request) {
        $product = products::find($request->id);

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'category' => 'required'
        ]);

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'category' => $request->category,
        ]);

        if (Auth::user()->user_type != 'admin') {
            return redirect()->route('profile')->with('success', 'Product updated successfully');
        } else {
            return redirect('seller/update_product')->with('success', 'Product updated successfully');
        }
        

    }

    function deleteProduct($id){
        $product = products::find($id);
        $product->delete();
        return redirect()->route('profile')->with('success', 'Product deleted successfully');
    }

    function userProfile(Request $request){
        $user = user_table::where('id', '=', $request->id)->first();
        if($user->user_type == 'buyer'){
            $productDetails = DB::table('order_histories')
            ->join('order_items', 'order_histories.order_id', '=', 'order_items.id')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->where('order_histories.user_id', $user->id)
            ->select('products.*', 'order_histories.status', 'order_histories.id')
            ->get();  
            
            return view('admin/viewprofile', ['productDetails' => $productDetails, 'user' => $user]);
        } else {
            $products = products::where('user_id', $request->id)->get();
            return view('admin/viewprofile', ['products' => $products, 'user' => $user]);
        }
    }

}

