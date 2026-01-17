<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegalCase extends Model
{
    use HasFactory;
    protected $fillable = ['client_id', 'title', 'description', 'case_number', 'status', 'filing_date', 'closing_date', 'court_specification_id'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    // (Optional) Scopes for filtering
    public function scopeOpen($query)
    {
        return $query->where('status', 'open');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'case_user')->withPivot('role')->withTimestamps();
    }

    public function notes()
    {
        return $this->hasMany(CaseNote::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function timeEntries()
    {
        return $this->hasMany(TimeEntry::class);
    }

    public function getTotalMinutesAttribute()
    {
        return $this->timeEntries()->sum('duration_minutes');
    }

    public function getTotalHoursAttribute()
    {
        return round($this->total_minutes / 60, 2);
    }

    public function courtSpecification()
    {
        return $this->belongsTo(CourtSpecification::class);
    }

    public function transfers()
    {
        return $this->hasMany(LegalCaseTransfer::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
