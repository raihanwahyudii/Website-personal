<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Admin
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin',
                'password' => bcrypt('password'), // password: password
                'role' => 'admin',
            ]
        );

        // Ustad
        User::updateOrCreate(
            ['email' => 'ustadz@example.com'],
            [
                'name' => 'Ustadz',
                'password' => bcrypt('password'), // password: password
                'role' => 'ustad',
            ]
        );

        // Santri
        User::updateOrCreate(
            ['email' => 'santri@example.com'],
            [
                'name' => 'Santri',
                'password' => bcrypt('password'), // password: password
                'role' => 'santri',
            ]
        );
    }
}
