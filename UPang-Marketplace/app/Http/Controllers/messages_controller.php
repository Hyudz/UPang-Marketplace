<?php

namespace App\Http\Controllers;

use App\Models\messages;
use Illuminate\Http\Request;
use App\Http\Livewire\Chat\Chatbox;

class messages_controller extends Controller
{
    public function index(){
        return view('messages.index')->with(Chatbox::class);
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
