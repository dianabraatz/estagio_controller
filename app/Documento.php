<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $fillable = [
        'nome', 'descricao'
    ];

    public function cursos()
    {
        return $this->belongsToMany(Curso::class);
    }
}
