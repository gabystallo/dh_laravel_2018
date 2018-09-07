<?php

use Faker\Generator as Faker;

use App\Tarea;

$factory->define(Tarea::class, function (Faker $faker) {
    return [
        'descripcion' => $faker->sentence
    ];
});
