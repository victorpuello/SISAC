<?php

use Faker\Generator as Faker;

$factory->define(\ATS\Model\Periodo::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'datestart' => $faker->date(),
        'dateend' => $faker->date(),
        'cierre' => $faker->dateTime,
        'estado' => $faker->numberBetween(),
        'anio_id' => $faker->dateTime,
    ];
});
