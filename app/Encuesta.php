<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
    protected $table = 'encuesta';
    protected $primaryKey = 'id_encuesta';
    const CREATED_AT = 'fecha_reg_encuesta';
    const UPDATED_AT = 'fecha_mod_encuesta';
}
