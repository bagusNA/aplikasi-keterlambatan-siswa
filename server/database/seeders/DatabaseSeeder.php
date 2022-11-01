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
        $this->call([
            RoleSeeder::class,
            SchoolYearSeeder::class,
            SpecialtySeeder::class,
            PicketSessionSeeder::class,
            OptionSeeder::class,
        ]);

        User::factory()->create([
            'username' => 'admin',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role_id' => random_int(1, 4),
        ]);

        User::factory(10)->create();
    }
}
