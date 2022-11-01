<?php

namespace Database\Seeders;

use App\Models\Specialty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecialtySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Specialty::factory()->create([
            'initial' => 'RPL',
            'name' => 'Rekayasa Perangkat Lunak',
            'desc' => fake()->paragraph()
        ]);

        Specialty::factory()->create([
            'initial' => 'MM',
            'name' => 'Multimedia',
            'desc' => fake()->paragraph()
        ]);

        Specialty::factory()->create([
            'initial' => 'TKJ',
            'name' => 'Teknik Komputer dan Jaringan',
            'desc' => fake()->paragraph()
        ]);
    }
}
