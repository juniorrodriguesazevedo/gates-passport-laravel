<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = 1;
        $moderatorRole = 2;
        $financialRole = 3;

        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@email.com',
            'password' => '123'
        ]);

        $moderator = User::create([
            'name' => 'moderator',
            'email' => 'moderator@email.com',
            'password' => '123'
        ]);

        $financial = User::create([
            'name' => 'financial',
            'email' => 'financial@email.com',
            'password' => '123'
        ]);

        $admin->roles()->attach($adminRole);
        $moderator->roles()->attach($moderatorRole);
        $financial->roles()->attach($financialRole);
    }
}
