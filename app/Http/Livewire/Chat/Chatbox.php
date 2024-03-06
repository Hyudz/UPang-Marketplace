<?php

namespace App\Http\Livewire\Chat;
use App\Models\messages;
use App\Models\user_table;

use Livewire\Component;

class Chatbox extends Component
{

    public $selectedUser;
    public $message;
    public $users;

    public function mount(){
        $this->users = user_table::where('id', '<>', auth()->user()->id)->get();
    }

    public function render()
    {
        $user = auth()->user();
        $messages = messages::where(function ($query) use ($user) {
            $query->where('sender_id', $user->id)->orWhere('receiver_id', $user->id);
        })
        ->with(['sender', 'receiver'])
        ->latest()
        ->get();

        return view('livewire.chat.chatbox');
    }
}
