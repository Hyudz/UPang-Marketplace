<?php

namespace App\Http\Controllers;

use App\Models\messages;
use Illuminate\Http\Request;

class messages_controller extends Controller
{
    public function index(){
        $user = auth()->user();
        $messages = messages::where('sender_id', $user->id)
        ->orWhere('receiver_id', $user->id)
        ->with(['sender'], ['receiver'])
        ->latest()
        ->get();

        return (['messages', $messages]);
    }

    public function store(Request $request){
        $request->validate([
            'receiver_id' => 'required',
            'content' => 'required'
        ]);

        $message = new messages([
            'sender_id' => auth()->user()->id,
            'receiver_id' => $request->receiver_id,
            'content' => $request->content,
            'message_type' => 'text',
            'user_id' => auth()->user()->id
        ]);

        $message->save();

        return response()->json(['message' => 'Message sent']);
    }

}
