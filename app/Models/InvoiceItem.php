<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    use HasFactory;

    protected $fillable = ['invoice_id', 'description', 'quantity', 'unit_price', 'total_price', 'time_entry_id'];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function timeEntry()
    {
        return $this->belongsTo(TimeEntry::class);
    }
}
