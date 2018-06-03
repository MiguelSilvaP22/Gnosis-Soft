<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoNivel extends Model
{
    protected $table = 'tiponivel';
    protected $primaryKey = 'id_tiponivel';
    const CREATED_AT = 'fecha_reg_tiponivel';
    const UPDATED_AT = 'fecha_mod_tiponivel';

 
}

