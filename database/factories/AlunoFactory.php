<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Aluno;
use Faker\Generator as Faker;
use App\Curso;

$factory->define(Aluno::class, function (Faker $faker) {
    $cursos = Curso::all(['id']);

    return [
        'nome' => $faker->name(),
        'matricula' => $faker->randomNumber(7),
        'curso_id' => $cursos->random()->id
    ];
});
