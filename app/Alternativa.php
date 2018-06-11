<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alternativa extends Model
{
    protected $table = 'alternativa';
    protected $primaryKey = 'id_alternativa';
    const CREATED_AT = 'fecha_reg_alternativa';
    const UPDATED_AT = 'fecha_mod_alternativa';
}
