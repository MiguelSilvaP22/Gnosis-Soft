<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlternativaEvaluacion extends Model
{
    protected $table = 'alternativaevaluacion';
    protected $primaryKey = 'id_altvev';
    const CREATED_AT = 'fecha_reg_altvev';
    const UPDATED_AT = 'fecha_mod_altvev';
}