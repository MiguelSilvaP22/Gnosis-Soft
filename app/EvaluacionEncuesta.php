<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EvaluacionEncuesta extends Model
{
    protected $table = 'evaluacionencuesta';
    protected $primaryKey = 'id_evencuesta';
    const CREATED_AT = 'fecha_reg_evencuesta';
    const UPDATED_AT = 'fecha_mod_evencuesta';
}
