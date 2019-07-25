<?php

use ATS\Model\Grado;
use Faker\Generator as Faker;

$factory->define(Grado::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'numero'=>$faker->numberBetween($min=0,$max=11),
        'nivel'=>$faker->name
    ];
});
