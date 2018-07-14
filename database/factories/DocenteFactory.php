<?php

use Faker\Generator as Faker;

$factory->define(Ngsoft\Docente::class, function (Faker $faker) {
    return [
        'typeid' => $faker->randomElement(['CC','CE','PT']),
        'numberid' => $faker->unique()->randomNumber(),
        'fnac' => $faker->date(),
        'gender'  => $faker->randomElement(['F','M']),
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'path' => $faker->randomElement(['1.jpg','2.jpg','3.jpg']),
        'coordinator' => $faker->boolean
    ];
});
