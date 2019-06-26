<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $fillable = [
        'nome'
    ];

    public function alunos()
    {
        $this->hasMany(\App\Aluno::class);
    }
}
