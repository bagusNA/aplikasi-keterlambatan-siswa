<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Teacher extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relations
    public function picketSchedule(): HasMany
    {
        return $this->hasMany(PicketSchedule::class);
    }

    public function class(): HasOne
    {
        return $this->hasOne(SchoolClass::class);
    }
}
