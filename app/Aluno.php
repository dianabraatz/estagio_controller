<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property Curso $curso
 * @property \Illuminta\Database\Eloquent\Collection $estagios
 */
class Aluno extends Model
{
    protected $fillable = [
        'nome', 'matricula', 'curso_id'
    ];

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    public function estagios()
    {
        return $this->hasMany(Estagio::class);
    }
}
