<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = [
        'nome',
        'razao_social',
        'cnpj'
    ];

    public function estagios()
    {
        return $this->hasMany(Estagio::class);
    }
}
