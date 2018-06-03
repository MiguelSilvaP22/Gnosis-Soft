<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompetenciaCurso extends Model
{
    protected $table = 'competenciacurso';
    protected $primaryKey = 'id_compcurso';
    const CREATED_AT = 'fecha_reg_compcurso';
    const UPDATED_AT = 'fecha_mod_compcurso';
}
