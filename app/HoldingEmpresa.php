<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoldingEmpresa extends Model
{
    protected $table = 'holdingempresa';
    protected $primaryKey = 'id_holdingempresa';
    const CREATED_AT = 'fecha_reg_holdingempresa';
    const UPDATED_AT = 'fecha_mod_holdingempresa';
}
