<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'User',
            'description' => 'Staff'
        ]);

        Role::create([
            'name' => 'Manager',
            'description' => 'Manager'
        ]);

        Role::create([
            'name' => 'Admin',
            'description' => 'HR Manager'
        ]);
    }
}
