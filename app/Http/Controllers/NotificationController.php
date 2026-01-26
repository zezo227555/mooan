<?php

namespace App\Http\Controllers;

use App\Models\Notification;

class NotificationController extends Controller
{
    /* =======================
     * USERS (STAFF)
     * ======================= */
    public function index()
    {
        $user = auth()->user();

        return view('notifications.index', [
            'notifications' => $user->notifications,
        ]);
    }

    /* =======================
     * CLIENTS
     * ======================= */
    public function clientIndex()
    {
        $client = auth('client')->user();

        return view('client.notifications.index', [
            'notifications' => $client->notifications,
        ]);
    }

    /* =======================
     * SHARED
     * ======================= */
    public function markAsRead(Notification $notification)
    {
        // 🔒 Ownership check (VERY IMPORTANT)
        if ((auth()->check() && $notification->notifiable_id !== auth()->id()) || (auth('client')->check() && $notification->notifiable_id !== auth('client')->id())) {
            abort(403);
        }

        $notification->markAsRead();

        return back();
    }
}
