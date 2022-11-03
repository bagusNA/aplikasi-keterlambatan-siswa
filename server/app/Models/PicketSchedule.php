<?php

namespace App\Models;

use Illuminate\Contracts\Support\MessageBag;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Validator;

class PicketSchedule extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relations
    public function session(): BelongsTo
    {
        return $this->belongsTo(PicketSession::class, 'picket_session_id');
    }

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }

    public function year(): BelongsTo
    {
        return $this->belongsTo(SchoolYear::class, 'school_year_id');
    }

    public static function validate($data): bool | MessageBag
    {
        $validation = Validator::make($data, [
            'picket_session_id' => 'required|integer',
            'teacher_id' => 'required|integer',
            'school_year_id' => 'required|integer',
        ]);

        return $validation->fails() ? $validation->errors() : true;
    }

    public static function getSchedulesByDay(string $day)
    {
        $sessions = PicketSession::where('day', $day)
                        ->get()
                        ->pluck('id')
                        ->toArray();

        $schedules = PicketSchedule::whereIn('picket_session_id', $sessions)
                        ->with(['session', 'teacher'])
                        ->get();

        return $schedules;
    }
}
