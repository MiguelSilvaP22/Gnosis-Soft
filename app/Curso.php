<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = 'curso';
    protected $primaryKey = 'id_curso';
    const CREATED_AT = 'fecha_reg_curso';
    const UPDATED_AT = 'fecha_mod_curso';
}
