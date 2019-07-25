<?php

use ATS\Model\Estudiante;
use Faker\Generator as Faker;

$factory->define(Estudiante::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'lastname' => $faker->lastName,
        'typeid' => $faker->randomElement(['RC','TI']),
        'identification' => $faker->numberBetween(),
        'birthday' => $faker->date($format = 'Y-m-d', $max = '-5 years'),
        'birthstate' => 14,
        'birthcity'  => $faker->numberBetween($min=604,$max=633),
        'gender' => $faker->randomElement(['M','F']),
        'address' => $faker->address,
        'EPS' => 'Maneska',
        'phone' => $faker->phoneNumber,
        'datein' => $faker->dateTimeThisYear(),
        'dateout' => Null,
        'path' => null,
        'stade'  => 'activo',
        'situation' => $faker->randomElement(['normal','normal']),
        'grupo_id' => $faker->numberBetween($min=1,$max=36)
    ];
});
