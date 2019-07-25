<?php

use ATS\Model\Anio;
use Faker\Generator as Faker;

$factory->define(Anio::class, function (Faker $faker) {
    return [
        'name' => $faker->year,
        'start' => $faker->date(),
        'end' => $faker->date(),
        'activo' => $faker->boolean
    ];
});
