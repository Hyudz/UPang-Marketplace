<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\products;
use App\Models\user_table;
use Illuminate\Support\Facades\Auth;

class products_controller extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }
    
    public function index(){
        $products = products::all();
        return response()->json([
            'status' => 'success',
            'message' => 'Products retrieved successfully',
            'data' => $products
        ]);
    }

    public function getSeller(Request $request){
        $sellerId = products::where('id', $request->id);
        $sellerName = user_table::where('id', $sellerId)->first();
        return response()->json($sellerId);
    }

    public function getBuyer(){
        $buyerId = Auth::user()->id;
        $buyerName = user_table::where('id', $buyerId)->first();
        return response()->json(['data' => $buyerName]);
    }

    public function store(Request $request){
        $user = Auth::user();

        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'quantity' => 'required',
        ]);
        $data['user_id'] = $user->id;
        return products::create($data);
    }

    public function update(Request $request){
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

        return response()->json([
            'status' => 'success',
            'message' => 'Product updated successfully',
            'data' => $product
        ]);
    }
    

    public function destroy($id){
        $product = products::find($id);
        $product->delete();
        return response()->json(['message' => 'Product deleted']);
    }

    public function show(){
        $product = products::all()->where('availability', 'approved')
        ->where('user_id', '!=' ,Auth::user()->id)
        ->values();
        
        return response()->json($product);
    }
}
