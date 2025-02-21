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
        $role = Role::firstOrCreate(['name' => 'Super Admin']);

        // Assign the role to the user
        $user->assignRole($role);
    }
}
