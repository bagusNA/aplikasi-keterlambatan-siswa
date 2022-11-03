<?php

namespace App\Http\Controllers;

use App\Models\Absentee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AbsenteeController extends Controller
{
    public function show()
    {
        $absentees = Absentee::all();

        return $this->successRes([
            'message' => 'Get all late absentees success!',
            'absentees' => $absentees
        ]);
    }

    public function create(Request $request)
    {
        $input = $request->all();
        $validation = Absentee::validate($input);
        
        if ($validation !== true)
            return $this->validationErrorRes($validation);

        $absent = Absentee::create([
            'student_id' => $input['student_id'],
            'picket_schedule_id' => $input['picket_schedule_id'],
            'time_arrived' => $input['time_arrived'],
            'description' => $input['description']
        ]);

        $absent->load(['student', 'schedule']);

        return $this->successRes([
            'message' => 'This student has been successfully added to the absentee.',
            'absent' => $absent,
        ]);
    }
}
