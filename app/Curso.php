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
        return $this->hasMany(Aluno::class);
    }

    public function documentos()
    {
        return $this->belongsToMany(Documento::class);
    }
}
