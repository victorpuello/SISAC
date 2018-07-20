<?php

use Faker\Generator as Faker;
use Ngsoft\User;

$factory->define(Ngsoft\Logro::class, function (Faker $faker) {
	$docentes = User::where('type','=','docente')->get();
    return [
        'description' => $faker->paragraph($nbSentences=1),
        'category' => $faker->randomElement(['cognitivo','procedimental','actitudinal']),
        'grade' => $faker->randomElement(['1','2','3','4','5','6','7','8','9','10','11']),
        'asignatura_id' => $faker->numberBetween($min = 1, $max = 13),
        'docente_id' => $faker->numberBetween($min = 1, $max = count($docentes)),
        'periodo_id' => $faker->numberBetween($min = 1, $max = 2)
    ];
});
