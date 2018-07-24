<?php

use Faker\Generator as Faker;
use Ngsoft\Docente;

$factory->define(Ngsoft\Asignacion::class, function (Faker $faker) {
    $cont = Docente::all()->count();
    return [
        'horas' => $faker->numberBetween($min=1,$max=6),
        'docente_id' => $faker->numberBetween($min=1,$max=$cont),
        'salon_id' => $faker->numberBetween($min=1,$max=36),
        'asignatura_id' => $faker->numberBetween($min=1,$max=13)
    ];
});
