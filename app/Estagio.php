<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estagio extends Model
{
    protected $fillable = [
        'data_inicio',
        'data_termino',
        'aluno_id',
        'empresa_id',
        'professor_id'
    ];

    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function professor()
    {
        return $this->belongsTo(Professor::class);
    }

    public function display()
    {
        return __(':aluno at :empresa (from :data_inicio to :data_termino)', [
            'aluno' => $this->aluno->nome,
            'empresa' => $this->empresa->nome,
            'data_inicio' => $this->data_inicio,
            'data_termino' => ($this->data_termino ? $this->data_termino : __('this date'))
        ]);
    }
}
