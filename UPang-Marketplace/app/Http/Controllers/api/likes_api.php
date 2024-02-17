<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\likes_table;
use Illuminate\Support\Facades\Auth;

class likes_api extends Controller
{

    public function index(Request $request){
        $user = Auth::user();

    if (!$user) {
        return response()->json(['message' => 'User not authenticated'], 401);
    }
        $like = likes_table::where('user_id', Auth::user()->id)->where('product_id', $request->id)->first();
        if($like){
            return response()->json(['message' => 'Product liked'], $like);
        }else{
            return response()->json(['message' => 'Product not liked']);
        }
    }

    public function store(Request $request){
        likes_table::create([
            'user_id' => Auth::user()->id,
            'product_id' => $request->id
        ]);
        return response()->json(['message' => 'Product liked']);
    }

    public function delete(Request $request){
        $like = likes_table::where('user_id', Auth::user()->id)->where('product_id', $request->id)->first();
        $like->delete();
        return response()->json(['message' => 'Product unliked']);
    }
}
