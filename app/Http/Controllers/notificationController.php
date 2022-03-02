<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class notificationController extends Controller
{
    public function allNotification()
    {
        $notifications = auth()->user()->notifications;
        auth()->user()->unreadNotifications()->update(['read_at' => now()]);
        
        return view('notification', ['notifications' => $notifications]);
    }
}
