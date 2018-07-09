<?php

use Faker\Generator as Faker;

$factory->define(Ngsoft\Logro::class, function (Faker $faker) {
    return [
        'code' => $faker->numberBetween(),
        'description' => $faker->paragraph($nbSentences=1),
        'category' => $faker->randomElement(['cognitivo','procedimental','actitudinal']),
        'grade' => $faker->randomElement(['1','2','3','4','5','6','7','8','9','10','11']),
        'asignatura_id' => $faker->numberBetween($min = 1, $max = 13)
    ];
});
