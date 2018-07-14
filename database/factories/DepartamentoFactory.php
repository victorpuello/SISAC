<?php

use Faker\Generator as Faker;

$factory->define(Ngsoft\Departamento::class, function (Faker $faker) {
    return [
        'name' => $faker->name
    ];
});
