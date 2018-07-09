<?php

use Faker\Generator as Faker;

$factory->define(Ngsoft\Acudiente::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'lastname' => $faker->lastName,
        'relationship' => $faker->randomElement(['Madre','Padre','Tío','Tía','Abuela','Hermano','Conyugue']),
        'document' => $faker->unique()->numberBetween($min = 1234567,$max =6789012),
        'phone' => $faker->phoneNumber,
        'email' => $faker->email,
        'address' => $faker->address,
        'estudiante_id' => $faker->unique()->numberBetween($min = 1 , $max = 315)
    ];
});
