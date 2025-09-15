<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'address', 'national_id', 'notes'];

    public function cases()
    {
        return $this->hasMany(LegalCase::class);
    }

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
