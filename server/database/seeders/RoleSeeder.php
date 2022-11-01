<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::factory()->create([
            'name' => 'ADMIN'
        ]);
        Role::factory()->create([
            'name' => 'TEACHER'
        ]);
        Role::factory()->create([
            'name' => 'PARENT'
        ]);
        Role::factory()->create([
            'name' => 'STUDENT'
        ]);
    }
}
