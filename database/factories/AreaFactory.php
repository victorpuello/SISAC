<?php

use Faker\Generator as Faker;

$factory->define(\ATS\Area::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'porcentaje' => $faker->numberBetween($min=1,$max =100)
    ];
});
