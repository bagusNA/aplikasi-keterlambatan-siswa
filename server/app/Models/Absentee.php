<?php

namespace App\Models;

use Illuminate\Contracts\Support\MessageBag;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Validator;

class Absentee extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relations
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    // public function schedule(): BelongsTo
    // {
    //     return $this->belongsTo(PicketSchedule::class, 'picket_schedule_id');
    // }

    public static function validate($data): bool | MessageBag
    {
        $validation = Validator::make($data, [
            'student_id' => 'required|integer',
            'picket_schedule_id' => 'required|integer',
            'time_arrived' => 'required|date', 
        ]);

        return $validation->fails() ? $validation->errors() : true;
    }
}
