<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EvaluacionDNC extends Model
{
    protected $table = 'id_evaluacion';
    protected $primaryKey = 'id_evaluacion';
    const CREATED_AT = 'fecha_reg_evaluacion';
    const UPDATED_AT = 'fecha_mod_evaluacion';
}
