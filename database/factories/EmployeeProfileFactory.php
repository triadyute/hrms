<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\EmployeeProfile;
use Faker\Generator as Faker;

$factory->define(EmployeeProfile::class, function (Faker $faker) {
    return [
        'manager_id' => 2,
        'hire_date' => now()
    ];
});
