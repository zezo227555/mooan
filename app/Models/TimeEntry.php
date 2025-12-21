<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimeEntry extends Model
{
    protected $fillable = ['legal_case_id', 'user_id', 'work_date', 'duration_minutes', 'description'];

    protected $casts = [
        'work_date' => 'date',
    ];

    public function case()
    {
        return $this->belongsTo(LegalCase::class, 'legal_case_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Helper (optional)
    public function getDurationHoursAttribute()
    {
        return round($this->duration_minutes / 60, 2);
    }

    public function invoiceItems()
    {
        return $this->hasMany(InvoiceItem::class, 'time_entry_id');
    }

    // ==============================
    // Convert this TimeEntry to an InvoiceItem
    // ==============================
    public function invoiceItem(): array
    {
        if (!$this->billable) {
            throw new \Exception("Time entry #{$this->id} is not billable.");
        }

        $unitPrice = $this->hourly_rate ?? 0;
        $totalPrice = $this->duration_hours * $unitPrice;

        return [
            'description' => $this->description ?: "خدمة قانونية بتاريخ {$this->work_date->format('Y-m-d')}",
            'quantity' => $this->duration_hours,
            'unit_price' => $unitPrice,
            'total_price' => $totalPrice,
            'time_entry_id' => $this->id,
            'case_id' => $this->case_id,
        ];
    }
}
