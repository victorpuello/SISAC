<?php

use Faker\Generator as Faker;

$factory->define(Ngsoft\Estudiante::class, function (Faker $faker) {
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
        'path' => $faker->randomElement(['no-user-image.png','no-user-image.png']),
        'stade'  => 'activo',
        'situation' => $faker->randomElement(['normal','normal']),
        'salon_id' => $faker->numberBetween($min=1,$max=19)
    ];
});
