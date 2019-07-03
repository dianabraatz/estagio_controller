<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property \Illuminate\Database\Eloquent\Collection $curso_documento
 * @property \Illuminate\Database\Eloquent\Collection $cursos
 */
class Documento extends Model
{
    protected $fillable = [
        'nome', 'descricao'
    ];

    public function curso_documento()
    {
        return $this->hasMany(CursoDocumento::class);
    }

    public function cursos()
    {
        return $this->belongsToMany(Curso::class)
                    ->using(CursoDocumento::class);
    }
}
