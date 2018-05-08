<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiroEmpresa extends Model
{
    protected $table = 'giroempresa';
    protected $primaryKey = 'id_giroempresa';
    const CREATED_AT = 'fecha_reg_giroempresa';
    const UPDATED_AT = 'fecha_mod_giroempresa';
}
