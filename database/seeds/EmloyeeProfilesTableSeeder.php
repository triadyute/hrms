<?php

use Illuminate\Database\Seeder;

class EmloyeeProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\EmployeeProfile::class)->create();
    }
}
