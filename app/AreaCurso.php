<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaCurso extends Model
{
    protected $table = 'areascurso';
    protected $primaryKey = 'id_areacurso';
    const CREATED_AT = 'fecha_reg_areacurso';
    const UPDATED_AT = 'fecha_mod_areacurso';
}
