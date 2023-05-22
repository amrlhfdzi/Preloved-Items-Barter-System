<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    public function index()
    {
    $user = Auth::user();
    $notifications = $user->notifications()->latest()->get();
    $notificationCount = $user->unreadNotifications->count();
    
        return view('messagesUser', compact('notifications', 'notificationCount'));
    }
    //
}
