<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    const ROLE_ADMIN = 'admin';
    const ROLE_ATTORNEY = 'attorney';
    const ROLE_RECEPTION = 'reception';

    protected $fillable = ['name', 'email', 'phone', 'role', 'is_active', 'password'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'is_active' => 'boolean',
        'last_login_at' => 'datetime',
    ];

    /* =====================
        Role Helpers
    ===================== */

    public function isAdmin(): bool
    {
        return $this->role === self::ROLE_ADMIN;
    }

    public function isAttorney(): bool
    {
        return $this->role === self::ROLE_ATTORNEY;
    }

    public function isReception(): bool
    {
        return $this->role === self::ROLE_RECEPTION;
    }

    /* =====================
        Relationships
    ===================== */

    public function timeEntries()
    {
        return $this->hasMany(TimeEntry::class);
    }

    public function legalCases()
    {
        return $this->belongsToMany(LegalCase::class, 'case_user')->withPivot('role')->withTimestamps();
    }

    public function notifications()
    {
        return $this->morphMany(Notification::class, 'notifiable')->latest();
    }

    public function unreadNotifications()
    {
        return $this->notifications()->whereNull('read_at');
    }
}
