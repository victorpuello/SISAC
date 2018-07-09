<?php

use Faker\Generator as Faker;

$factory->define(Ngsoft\Periodo::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'datestart' => $faker->dateTimeBetween($startDate='-1 years',$endDate='now'),
        'dateend' => null
    ];
});
