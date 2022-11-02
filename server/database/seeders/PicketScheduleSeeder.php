<?php

namespace Database\Seeders;

use App\Models\PicketSchedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PicketScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 24; $i++) { 
            PicketSchedule::factory()->create([
                'picket_session_id' => $i,
                'teacher_id' => random_int(1, 10),
                'school_year_id' => random_int(1, 3)
            ]);
        }
    }
}
