<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Specialty extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relations
    public function classes(): HasMany
    {
        return $this->hasMany(SchoolClass::class);
    }
}
