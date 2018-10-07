<?php

use ATS\Model\Institucion;
use Faker\Generator as Faker;

$factory->define(Institucion::class, function (Faker $faker) {
    return [
        'name'=> $faker->name,
        'siglas'=> $faker->name,
        'resolucion'=> $faker->numberBetween($min=12345678,$max=123456789),
        'dane'=> $faker->numberBetween($min=12345678,$max=123456789),
        'nit'=> $faker->numberBetween($min=12345678,$max=123456789),
        'address'=> $faker->address,
        'phone'=> $faker->phoneNumber,
        'email'=> $faker->companyEmail,
        'rector'=> $faker->name('male'),
        'idrector'=> $faker->numberBetween($min=12345678,$max=123456789),
        'slogan'=> $faker->realText($maxNbChars=30),
        'path'=> null,
    ];
});
