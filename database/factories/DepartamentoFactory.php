<?php

use Faker\Generator as Faker;

$factory->define(ATS\Departamento::class, function (Faker $faker) {
    return [
        'name' => $faker->name
    ];
});
