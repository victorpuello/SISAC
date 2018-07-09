<?php

use Faker\Generator as Faker;

$factory->define(Ngsoft\Asignatura::class, function (Faker $faker) {
    return [
        'name' => $faker->name
    ];
});
