<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SchoolYear extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relations
    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }

    public function picketSchedules(): HasMany
    {
        return $this->hasMany(PicketSchedule::class);
    }
}
