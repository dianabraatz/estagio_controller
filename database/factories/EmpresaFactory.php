<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Empresa;
use Faker\Generator as Faker;

$factory->define(Empresa::class, function (Faker $faker) {
    $n = $faker->company;

    return [
        'nome' => $n,
        'razao_social' => $n,
        'cnpj' => $faker->unique()->numerify('##############')
    ];
});
