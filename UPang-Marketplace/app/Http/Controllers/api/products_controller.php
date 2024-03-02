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
        $sellerId = products::where('id', $request->id)->first()->user_id;
        $sellerName = user_table::where('id', $sellerId)->first()->first_name;
        return response()->json(['data' => $sellerName]);
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

    public function update(Request $request, $id){
        $product = products::where('id', $id)
                            ->first();
    
        if(!$product){
            return response()->json([
                'status' => 'error',
                'message' => 'Product not found'
            ]);
        }
    
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'quantity' => 'required',
        ]);

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity
        ]);
    
        return response()->json([
            'status' => 'success',
            'message' => 'Product updated successfully',
            'data' => $product
        ]);
    }
    

    public function destroy($id){
        $product = products::findOrFail($id);
        $product->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Product deleted successfully',
            'data' => $product
        ]);
    }

    public function show(){
        $product = products::all()->where('availability', 'approved')
        ->where('user_id', '!=' ,Auth::user()->id)
        ->values();
        
        return response()->json($product);
    }
}
