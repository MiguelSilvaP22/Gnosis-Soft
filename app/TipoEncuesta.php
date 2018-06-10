<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoEncuesta extends Model
{
    protected $table = 'tipoencuesta';
    protected $primaryKey = 'id_tipoencuesta';
    const CREATED_AT = 'fecha_reg_tipoencuesta';
    const UPDATED_AT = 'fecha_mod_tipoencuesta';
}
