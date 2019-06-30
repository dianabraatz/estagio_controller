<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class CursoDocumento extends Pivot
{
    use SoftDeletes;
}
