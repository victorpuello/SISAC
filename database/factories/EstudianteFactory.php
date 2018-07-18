<?php

use Faker\Generator as Faker;

$factory->define(Ngsoft\Estudiante::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'lastname' => $faker->lastName,
        'typeid' => $faker->randomElement(['RC','TI','CC']),
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
        'path' => $faker->randomElement(['1.jpg','2.jpg','3.jpg','4.jpg','5.jpg','6.jpg','7.jpg','8.jpg']),
        'stade'  => $faker->randomElement(['activo','retirado','activo','activo','graduado']),
        'situation' => $faker->randomElement(['repitente','promovido','promovido','promovido','promovido']),
        'salon_id' => $faker->numberBetween($min=1,$max=36)
    ];
});
