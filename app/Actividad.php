<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $table = 'actividad';
    protected $primaryKey = 'id_actividad';
    const CREATED_AT = 'fecha_reg_actividad';
    const UPDATED_AT = 'fecha_mod_actividad';
}
