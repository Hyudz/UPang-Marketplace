<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\products;

class products_controller extends Controller
{
    public function index(){
        $products = products::all();
        return response()->json([
            'status' => 'success',
            'message' => 'Products retrieved successfully',
            'data' => $products
        ]);
    }

    public function store(Request $request){
        return products::create($request->all());
    }

    public function update(Request $request, $id){
        $product = products::findOrFail($id);
        $product->update($request->all());
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
}
