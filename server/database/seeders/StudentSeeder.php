<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\StudentParent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classId = 1;
        for ($i=(51 + 1); $i <= (51 + 49); $i++) { 
            $classId = $classId > 3 ? 1 : $classId;

            $student = Student::factory()->create([
                'nisn' => str_pad(strval(random_int(1, 9999999999)), 10, '0', STR_PAD_LEFT),
                'user_id' => $i,
                'name' => fake()->name(),
                'gender' => rand(0, 1) ? 'Male' : 'Female',
                'class_id' => $classId++,
                'school_year_id' => 2
            ]);

            StudentParent::factory()->create([
                'user_id' => 100 + ($i - 51),
                'name' => fake()->name(),
                'student_id' => $student->id
            ]);
        }
    }
}
