<?php

namespace App\Http\Controllers;

use App\Models\PicketSchedule;
use App\Models\PicketSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    public function detail($day = null)
    {
        if ($day === 'today')
            $day = date('D');

        $sessions = PicketSession::where('day', $day)
                        ->get()
                        ->pluck('id')
                        ->toArray();

        $schedules = PicketSchedule::whereIn('picket_session_id', $sessions)
                        ->with(['session', 'teacher'])
                        ->get();

        return $this->successRes([
            'message' => 'Get schedules success!',
            'schedules' => $schedules,
        ]);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'picket_session_id' => 'required|integer',
            'teacher_id' => 'required|integer',
            'school_year_id' => 'required|integer',
        ]);

        if ($validator->fails())
            return $this->validationErrorRes($validator->errors());

        $input = $validator->getData();

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
