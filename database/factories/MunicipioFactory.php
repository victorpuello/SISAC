<?php

use Faker\Generator as Faker;

$factory->define(Ngsoft\Municipio::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'departamento_id' => ''
    ];
});
