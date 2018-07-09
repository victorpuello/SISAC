<?php

use Faker\Generator as Faker;

$factory->define(Ngsoft\Salon::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['1','2','3']),
        'grade' => $faker->randomElement(['1','2','3']),
    ];
});
