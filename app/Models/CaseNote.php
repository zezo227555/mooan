<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseNote extends Model
{
    use HasFactory;
    protected $fillable = ['legal_case_id', 'user_id', 'title', 'body'];

    public function case()
    {
        return $this->belongsTo(LegalCase::class, 'legal_case_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
