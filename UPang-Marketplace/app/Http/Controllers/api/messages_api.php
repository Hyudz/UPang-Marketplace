<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class messages_api extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index(){
        $user = auth()->user();
        $messages = $user->messages;
        return response()->json($messages);
    }

    public function markAsRead(){
        $user = auth()->user();
        $user->unreadMessages->markAsRead();
        return response()->json(['message' => 'All messages marked as read']);
    }

    public function markAsReadOne($id){
        $user = auth()->user();
        $user->unreadMessages->where('id', $id)->markAsRead();
        return response()->json(['message' => 'Message marked as read']);
    }

    public function destroy($id){
        $user = auth()->user();
        $user->messages->where('id', $id)->delete();
        return response()->json(['message' => 'Message deleted']);
    }

    public function store(Request $request){
        $user = auth()->user();
        $user->messages->create([
            'user_id' => $user->id,
            'message' => $request->message
        ]);
        return response()->json(['message' => 'Message sent']);
    }
}
