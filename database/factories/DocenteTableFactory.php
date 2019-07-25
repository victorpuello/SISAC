<?php

use Faker\Generator as Faker;

$factory->define(\ATS\Model\Docente::class, function (Faker $faker) {
    return [
        'typeid' => $faker->randomElement(['CC','CE','PT']),
        'numberid' => $faker->unique()->randomNumber(),
        'fnac' => $faker->date(),
        'gender'  => $faker->randomElement(['F','M']),
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
    ];
});
