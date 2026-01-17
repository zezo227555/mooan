<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = ['legal_case_id', 'invoice_number', 'issue_date', 'due_date', 'status', 'total_amount'];

    public function legalCase()
    {
        return $this->belongsTo(LegalCase::class);
    }

    public function items()
    {
        return $this->hasMany(InvoiceItem::class);
    }
}
