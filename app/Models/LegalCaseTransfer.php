<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LegalCaseTransfer extends Model
{
    protected $fillable = ['legal_case_id', 'from_court_id', 'to_court_id', 'user_id', 'reason'];

    public function legalCase()
    {
        return $this->belongsTo(LegalCase::class);
    }

    public function fromCourt()
    {
        return $this->belongsTo(CourtSpecification::class, 'from_court_id');
    }

    public function toCourt()
    {
        return $this->belongsTo(CourtSpecification::class, 'to_court_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
