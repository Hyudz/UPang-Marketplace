<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class notifications_api extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index(){
        $user = auth()->user();
        $notifications = $user->notifications;
        return response()->json($notifications);
    }

    public function markAsRead(){
        $user = auth()->user();
        $user->unreadNotifications->markAsRead();
        return response()->json(['message' => 'All notifications marked as read']);
    }

    public function markAsReadOne($id){
        $user = auth()->user();
        $user->unreadNotifications->where('id', $id)->markAsRead();
        return response()->json(['message' => 'Notification marked as read']);
    }

    public function destroy($id){
        $user = auth()->user();
        $user->notifications->where('id', $id)->delete();
        return response()->json(['message' => 'Notification deleted']);
    }
}
