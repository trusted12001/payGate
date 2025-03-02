<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserRoleSeeder extends Seeder
{
    public function run()
    {
        // Get the first user
        $user = User::first();

        // Create a role if it doesn't exist
        $roles = Role::firstOrCreate(['name' => 'Super Admin']);
        $roles = Role::firstOrCreate(['name' => 'Admin']);
        $roles = Role::firstOrCreate(['name' => 'Manager']);
        $roles = Role::firstOrCreate(['name' => 'Agent']);

        // Assign the role to the user
        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }
    }
}
