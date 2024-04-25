<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test',
            'lastname' => 'Admin',
            'email' => 'admin@example.com',
            'password' => 'Adm1n$t2024',
            'type' => 'admin'
        ]);

        User::factory()->create([
            'name' => 'Test',
            'lastname' => 'Teacher',
            'email' => 'teacher@example.com',
            'password' => 'T3acher$',
            'type' => 'teacher'
        ]);
    }
}
