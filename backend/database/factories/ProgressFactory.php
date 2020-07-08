<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Progress;
use Faker\Generator as Faker;

$factory->define(Progress::class, function (Faker $faker) {
    return [
        'reception_time' => $faker->date,
        'reception_person' => $faker->name,
        'name' => $faker->name,
        'gender' => $faker->randomElement(['0', '1']),
        'company' => $faker->company,
        'doctor_check' => $faker->randomElement(['0', '1']),
        'nurse_check' => $faker->randomElement(['0', '1']),
    ];
});
