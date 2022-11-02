<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // These needs to be in order
        $this->call([
            OptionSeeder::class,
            RoleSeeder::class,
            SchoolYearSeeder::class,
            SpecialtySeeder::class,

            UserSeeder::class,
            TeacherSeeder::class,

            PicketSessionSeeder::class,
            PicketScheduleSeeder::class,
        ]);

        
    }
}
