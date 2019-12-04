<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use App\EmployeeProfile;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName(),
        'middle_name' => $faker->firstName(),
        'employee_profile_id' => EmployeeProfile::create([
            'user_id' => $faker->unique()->randomElement([4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23]),
            'department_id' => 1,
            'manager_id' => 2,
            'job_title' => $faker->randomElement(['Web Developer','Tester',]),
            'hire_date' => now()
         ])->id,
        'last_name' => $faker->lastName(),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});
