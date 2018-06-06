<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HorarioFacilitador extends Model
{
    protected $table = 'horariofacilitador';
    protected $primaryKey = 'id_horafaci';
    const CREATED_AT = 'fecha_reg_horafaci';
    const UPDATED_AT = 'fecha_mod_horafaci';	
}
