<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\cart_items;
use Illuminate\Support\Facades\Auth;

class cart_api extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');    
    }

    public function index(Request $request){
        $likes = cart_items::where('user_id', Auth::user()->id)->get();
        return response()->json($likes);
    }

    public function store(Request $request){
        cart_items::create([
            'user_id' => Auth::user()->id,
            'product_id' => $request->id
        ]);
        return response()->json(['message' => 'Product liked']);
    }

    public function destroy($id){
        $user = auth()->user(); // Retrieve the authenticated user object
        $user = auth('sanctum')->user();
    
        if ($user) {
            $userId = $user->id; // Get the user ID from the user object
    
            $like = cart_items::where('user_id', $userId)
                                ->where('product_id', $id)
                                ->first();
    
            if ($like) {
                $like->delete();
                return response()->json(['message' => 'Product unliked']);
            } else {
                return response()->json(['message' => 'Product not liked'], 404);
            }
        } else {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
    }
}
