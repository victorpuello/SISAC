<?php

use Faker\Generator as Faker;

$factory->define(Ngsoft\Estudiante::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'lastname' => $faker->lastName,
        'typeid' => $faker->randomElement(['RC','TI','CC']),
        'identification' => $faker->numberBetween(),
        'birthstate' => 'CORDOBA',
        'birthcity'  => $faker->city,
        'gender' => $faker->randomElement(['M','F']),
        'address' => $faker->address,
        'EPS' => 'Maneska',
        'phone' => $faker->phoneNumber,
        'datein' => $faker->dateTimeThisYear(),
        'dateout' => Null,
        'path' => 'public/img/2.jpg',
        'stade'  => $faker->randomElement(['activo','retirado','activo','activo','graduado']),
        'situation' => $faker->randomElement(['repitente','promovido','promovido','promovido','promovido']),
        'salon_id' => $faker->numberBetween($min=1,$max=36)
    ];
});
