<?php

use Faker\Generator as Faker;

$factory->define(\ATS\Jornada::class, function (Faker $faker) {
    return [
        'name'=>$faker->name
    ];
});
