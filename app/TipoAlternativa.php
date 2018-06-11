<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoAlternativa extends Model
{
    protected $table = 'tipoalternativa';
    protected $primaryKey = 'id_tipoaltv';
    const CREATED_AT = 'fecha_reg_tipoaltv';
    const UPDATED_AT = 'fecha_mod_tipoaltv';
}
