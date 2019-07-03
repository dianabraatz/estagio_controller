<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CursoDocumentoEstagio extends Pivot
{
    public function curso_documentos()
    {
        return $this->belongsTo(CursoDocumento::class, 'curso_documento_id', 'id', 'curso_documento');
    }

    public function estagio()
    {
        return $this->belongsTo(Estagio::class);
    }
}
