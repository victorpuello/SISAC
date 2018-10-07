<?php

use ATS\Model\Jornada;
use Faker\Generator as Faker;

$factory->define(Jornada::class, function (Faker $faker) {
    return [
        'name'=>$faker->name
    ];
});
