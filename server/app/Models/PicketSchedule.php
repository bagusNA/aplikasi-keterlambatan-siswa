<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PicketSchedule extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relations
    public function session(): BelongsTo
    {
        return $this->belongsTo(PicketSession::class);
    }

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }

    public function year(): BelongsTo
    {
        return $this->belongsTo(SchoolYear::class);
    }
}
