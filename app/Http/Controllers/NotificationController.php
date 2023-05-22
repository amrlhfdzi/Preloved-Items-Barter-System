<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class NotificationController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $notifications = $user->notifications()->latest()->get();

        return view('notifications.index', compact('notifications'));
    }

    public function markAsRead(Notification $notification)
    {
        $notification->delete();

        return redirect('profile');
    }

    public function clearAll()
    {
        $user = Auth::user();
        $user->notifications()->delete();

        return redirect()->back()->with('success', 'All notifications have been cleared.');
    }

    //
}
