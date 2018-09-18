<?php

use Faker\Generator as Faker;

$factory->define(ATS\Municipio::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'departamento_id' => ''
    ];
});
