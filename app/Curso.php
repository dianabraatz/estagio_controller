<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property \Illuminate\Database\Eloquent\Collection $alunos
 * @property \Illuminate\Database\Eloquent\Collection $curso_documento
 * @property \Illuminate\Database\Eloquent\Collection $documentos
 */
class Curso extends Model
{
    protected $fillable = [
        'nome'
    ];

    public function alunos()
    {
        return $this->hasMany(Aluno::class);
    }

    public function curso_documento()
    {
        return $this->hasMany(CursoDocumento::class);
    }

    public function documentos()
    {
        return $this->belongsToMany(Documento::class)
                    ->using(CursoDocumento::class);
    }
}
