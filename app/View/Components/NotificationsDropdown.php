<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NotificationsDropdown extends Component
{
    public $notifications;
    public $unreadCount;
    public $isClient;

    public function __construct()
    {
        $this->isClient = auth('client')->check();

        $notifiable = $this->isClient ? auth('client')->user() : auth()->user();

        $this->notifications = $notifiable ? $notifiable->unreadNotifications()->latest()->limit(5)->get() : collect();

        $this->unreadCount = $notifiable ? $notifiable->unreadNotifications()->count() : 0;
    }

    public function render()
    {
        return view('components.notifications-dropdown');
    }
}
