<?php

use Illuminate\Database\Seeder;
use App\Department;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $software_department = Department::create();
        $software_department->company_id = 1;
        $software_department->name = 'Software Development';
        $software_department->save();

        $hr_department = Department::create();
        $hr_department->company_id = 1;
        $hr_department->name = 'Human Resources';
        $hr_department->save();
    }
}
