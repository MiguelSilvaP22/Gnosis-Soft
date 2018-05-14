<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gerencia extends Model
{
    protected $table = 'gerencia';
    protected $primaryKey = 'id_gerencia';
    const CREATED_AT = 'fecha_reg_gerencia';
    const UPDATED_AT = 'fecha_mod_gerencia';
}
