<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CursoDocumento extends Pivot
{
    public $incrementing = true;

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    public function documento()
    {
        return $this->belongsTo(Documento::class);
    }
}
