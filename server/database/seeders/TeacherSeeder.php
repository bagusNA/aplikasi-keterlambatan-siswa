<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=2; $i <= 51; $i++) { 
            Teacher::factory()->create([
                'user_id' => $i,
                'nip' => '0000 0000 0000',
                'name' => fake()->name(),
            ]);
        }
    }
}
