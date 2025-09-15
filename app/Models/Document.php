<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $fillable = ['legal_case_id', 'user_id', 'title', 'description', 'file_path', 'mime_type'];

    public function case()
    {
        return $this->belongsTo(LegalCase::class, 'legal_case_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
