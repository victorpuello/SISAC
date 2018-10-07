<?php

use ATS\Model\Departamento;
use Faker\Generator as Faker;

$factory->define(Departamento::class, function (Faker $faker) {
    return [
        'name' => $faker->name
    ];
});
