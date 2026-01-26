<?php

namespace App\Helpers;

use App\Models\Notification;

class NotificationHelper
{
    public static function notify($notifiable, array $data)
    {
        if (!$notifiable) {
            return;
        }

        $notifiable->notifications()->create([
            'type' => $data['type'],
            'title' => $data['title'],
            'message' => $data['message'] ?? null,
            'url' => $data['url'] ?? null,
        ]);
    }
}
