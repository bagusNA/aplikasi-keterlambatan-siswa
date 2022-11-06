<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function show(Request $request)
    {
        $query = $request->query('q');

        if ($query)
            $students = Student::where('name', 'like', '%'.$query.'%')->with('class.specialty')->get();
        else
            $students = Student::all()->load('class.specialty');

        return $this->successRes([
            'students' => $students
        ]);
    }
}
