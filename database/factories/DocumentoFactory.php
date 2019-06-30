<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Documento;
use Faker\Generator as Faker;

$factory->define(Documento::class, function (Faker $faker) {
    return [
        'nome' => $faker->sentence(4),
        'descricao' => $faker->sentence()
    ];
});
