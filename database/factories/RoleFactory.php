<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Role;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['User', 'Manager', 'Admin']),
        'description' => $faker->sentence
    ];
});
$factory->state(Role::class, 'USER', ['name' => 'User']);
$factory->state(Role::class, 'USER', ['name' => 'Manager']);
$factory->state(Role::class, 'ADMIN', ['name' => 'Admin']);