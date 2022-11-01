<?php

namespace Database\Seeders;

use App\Models\SchoolYear;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SchoolYear::factory()->create([
            'year_start' => 2020,
            'year_end' => 2021,
        ]);

        SchoolYear::factory()->create([
            'year_start' => 2021,
            'year_end' => 2022,
        ]);

        SchoolYear::factory()->create([
            'year_start' => 2022,
            'year_end' => 2023,
        ]);
    }
}
