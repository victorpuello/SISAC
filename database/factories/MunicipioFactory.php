<?php

use ATS\Model\Municipio;
use Faker\Generator as Faker;

$factory->define(Municipio::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'departamento_id' => ''
    ];
});
