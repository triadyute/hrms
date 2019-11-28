<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\EmployeeProfile;
use Faker\Generator as Faker;

$factory->define(EmployeeProfile::class, function (Faker $faker) {
    return [
        'hire_date' => now()
    ];
});
