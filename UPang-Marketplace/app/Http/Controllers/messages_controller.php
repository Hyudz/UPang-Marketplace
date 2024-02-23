<?php

namespace App\Http\Controllers;

use App\Models\messages;
use App\Models\user_table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class messages_controller extends Controller
{

    public function __construct()
    {
        $this->middleware('login');
    }

    public function index(){
        $usertype = Auth::user();
        $notifications = DB::table('notifications')->where('user_id', Auth::user()->id)->get();

        $uniqueUserIds = messages::where('receiver_id', Auth::user()->id)
            ->orWhere('sender_id', Auth::user()->id)
            ->select('sender_id')
            ->union(messages::where('receiver_id', Auth::user()->id)
                ->orWhere('sender_id', Auth::user()->id)
                ->select('receiver_id')
            )
            ->get()
            ->pluck('sender_id')
            ->unique();
        $users = user_table::whereIn('id', $uniqueUserIds)->get();
        $latestMessages = collect([]);
    
        foreach ($users as $user) {
            $latestMessage = messages::where(function ($query) use ($user) {
                $query->where('sender_id', Auth::user()->id)
                    ->where('receiver_id', $user->id);
            })->orWhere(function ($query) use ($user) {
                $query->where('sender_id', $user->id)
                    ->where('receiver_id', Auth::user()->id);
            })->latest()->first();
    
            $latestMessages->push($latestMessage);
        }
        $latestMessages = $latestMessages->filter();
        return view('messages', [
            'usertype' => $usertype,
            'notifications' => $notifications,
            'users' => $users,
            'latestMessages' => $latestMessages,
            'sender_chats' => "0",
            'receiver_chats' => "0",
            'chats' => "0"

        ]);
    }

    public function chats($id) {
        $usertype = Auth::user();
        $notifications = DB::table('notifications')->where('user_id', Auth::user()->id)->get();

        $uniqueUserIds = messages::where('receiver_id', Auth::user()->id)
            ->orWhere('sender_id', Auth::user()->id)
            ->select('sender_id')
            ->union(messages::where('receiver_id', Auth::user()->id)
                ->orWhere('sender_id', Auth::user()->id)
                ->select('receiver_id')
            )
            ->get()
            ->pluck('sender_id')
            ->unique();
        $users = user_table::whereIn('id', $uniqueUserIds)->get();
        $latestMessages = collect([]);
    
        foreach ($users as $user) {
            $latestMessage = messages::where(function ($query) use ($user) {
                $query->where('sender_id', Auth::user()->id)
                    ->where('receiver_id', $user->id);
            })->orWhere(function ($query) use ($user) {
                $query->where('sender_id', $user->id)
                    ->where('receiver_id', Auth::user()->id);
            })->latest()->first();
    
            $latestMessages->push($latestMessage);
        }
        $latestMessages = $latestMessages->filter();

        $chats = messages::where('receiver_id', Auth::user()->id)
            ->orWhere('sender_id', Auth::user()->id)
            ->with(['sender', 'receiver'])
            ->latest()
            ->get();
        
            $user_id = Auth::user()->id;


            $sender_chats = messages::where([
                ['sender_id', $user_id],
                ['receiver_id', $id]
            ])
            ->latest()
            ->get();
        
        
        $receiver_chats = messages::where([
            ['receiver_id', $user_id],
            ['sender_id', $id]
        ])
            ->latest()
            ->get();

        return view('messages', [
            'usertype' => $usertype,
            'notifications' => $notifications,
            'users' => $users,
            'latestMessages' => $latestMessages,
            'chats' => $chats,
            'sender_chats' => $sender_chats,
            'receiver_chats' => $receiver_chats
        ]);
    }
    

    
    public function store(Request $request){
        
    }

}
