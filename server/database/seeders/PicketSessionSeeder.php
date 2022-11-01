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
        PicketSession::factory()->create([
            'time_start' => '07:00',
            'time_end' => '10:00'
        ]);

        PicketSession::factory()->create([
            'time_start' => '10:00',
            'time_end' => '13:00'
        ]);

        PicketSession::factory()->create([
            'time_start' => '13:00',
            'time_end' => '16:00'
        ]);

        PicketSession::factory()->create([
            'time_start' => '16:00',
            'time_end' => '17:00'
        ]);
    }
}
