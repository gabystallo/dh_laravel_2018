<?php

use Faker\Generator as Faker;
use App\Autor;

$factory->define(Autor::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name
    ];
});
