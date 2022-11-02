<?php

namespace Database\Seeders;

use App\Models\PicketSession;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PicketSessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $days = [
            'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'
        ];

        $times = [
            [
                'start' => '07:00',
                'end' => '10:00',
            ],
            [
                'start' => '10:00',
                'end' => '13:00',
            ],
            [
                'start' => '13:00',
                'end' => '16:00',
            ],
            [
                'start' => '16:00',
                'end' => '17:00',
            ],
        ];

        foreach ($days as $day) {
            foreach ($times as $time) {
                PicketSession::factory()->create([
                    'day' => $day,
                    'time_start' => $time['start'],
                    'time_end' => $time['end'],
                ]);
            }
        }
    }
}
