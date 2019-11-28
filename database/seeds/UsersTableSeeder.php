<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Role;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {   
        $role_user = Role::find(1);
        $role_manager = Role::find(2);
        $role_admin = Role::find(3);

        $user = User::create();
        $user->employee_profile_id = factory(\App\EmployeeProfile::class)->create(['user_id' => $user->id, 'department_id' => 1, 'manager_id' => 2, 'job_title' => 'Software Developer'])->id;
        $user->email = 'user@hrportal.com';
        $user->first_name = $faker->firstName();
        $user->last_name = $faker->lastName();
        $user->email_verified_at = now();
        $user->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'; // password
        $user->remember_token = Str::random(10);
        $user->roles()->attach($role_user);
        $user->save();

        $manager = User::create();
        $manager->employee_profile_id = factory(\App\EmployeeProfile::class)->create(['user_id' => $manager->id, 'department_id' => 1, 'job_title' => 'Lead Developer'])->id;
        $manager->email = 'manager@hrportal.com';
        $manager->first_name = $faker->firstName();
        $manager->last_name = $faker->lastName();
        $manager->email_verified_at = now();
        $manager->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'; // password
        $manager->remember_token = Str::random(10);
        $manager->roles()->attach($role_manager);
        $manager->save();

        $admin = factory(User::class)->create(['email' => 'admin@hrportal.com']);
        $admin->employee_profile_id = factory(\App\EmployeeProfile::class)->create(['user_id' => $admin->id, 'department_id' => 2, 'job_title' => 'HR Manager'])->id;
        $admin->roles()->attach($role_admin);
        $admin->save();
    }
}