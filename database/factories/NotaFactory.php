<?php

use Faker\Generator as Faker;

$factory->define(Ngsoft\Nota::class, function (Faker $faker) {
    return [
        'score' => $faker->numberBetween($min=1,$max=10),
        'logro_id' => $faker->numberBetween($min = 1, $max=78),
        'estudiante_id' => $faker->randomElement([1,315])
    ];
});
