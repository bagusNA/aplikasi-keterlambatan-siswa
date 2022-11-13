<?php

namespace App\Http\Controllers;

use App\Models\PicketSchedule;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class PicketScheduleController extends Controller
{
    public function show()
    {
        $schedules = PicketSchedule::all()->with('session');

        return $this->successRes([
            'message' => 'Get all schedules success!',
            'schedules' => $schedules,
        ]);
    }

    public function current(Request $request)
    {
        $user = $request->user();
        $teacher = Teacher::where('user_id', $user->id)->first();
        $time = new Date();

        $schedule = PicketSchedule::where('teacher_id', $teacher->id)->first();

        return $this->successRes([
            'message' => 'Get current user schedule success!',
            'schedule' => $schedule,
            'time' => $time,
            'teacher' => $teacher,
        ]);
    }

    public function detail($day = null)
    {
        if ($day === 'today')
            $day = date('D');

        $schedules = PicketSchedule::getSchedulesByDay($day);

        return $this->successRes([
            'message' => 'Get schedules success!',
            'schedules' => $schedules,
        ]);
    }

    public function create(Request $request)
    {
        $input = $request->all();
        $validation = PicketSchedule::validate($input);
        
        if ($validation !== true)
            return $this->validationErrorRes($validation);

        $schedule = PicketSchedule::create([
            'picket_session_id' => $input['picket_session_id'],
            'teacher_id' => $input['teacher_id'],
            'school_year_id' => $input['school_year_id'],
        ]);

        $schedule->load(['teacher', 'year']);

        return $this->successRes([
            'message' => 'Picket schedule successfully added!',
            'picketSchedule' => $schedule,
        ]);
    }
}
