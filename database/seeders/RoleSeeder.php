<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Role::factory(3)->create();

        $roles = collect([
            [
                'role_name' => 'Admin',
                'description' => 'Admin access'
            ],
            [
                'role_name' => 'User',
                'description' => 'General user access'
            ],
            [
                'role_name' => 'Guest',
                'description' => 'Guest user access'
            ]
        ]);

        $roles->each(function ($role) {
            Role::create($role);
        });
    }
}
