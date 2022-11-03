<?php

namespace Database\Seeders;

use App\Models\SchoolClass;
use App\Models\Specialty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specialties = Specialty::all()->pluck('id')->toArray();

        $teacher = 1;

        for ($grade=1; $grade < 4; $grade++) { 
            foreach ($specialties as $specialty) {
                for ($number=1; $number < 4; $number++) { 
                    SchoolClass::factory()->create([
                        'grade' => $grade,
                        'specialty_id' => $specialty,
                        'number' => $number,
                        'teacher_id' => $teacher++
                    ]);
                }
            }
        }
    }
}
