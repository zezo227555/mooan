<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourtSpecification extends Model
{
    protected $fillable = ['name', 'code', 'description', 'active'];

    public function legalCases()
    {
        return $this->hasMany(LegalCase::class);
    }
}
