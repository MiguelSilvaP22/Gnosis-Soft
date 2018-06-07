<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HorarioColaborador extends Model
{
    protected $table = 'horariocolaborador';
    protected $primaryKey = 'id_horacolab';
    const CREATED_AT = 'fecha_reg_horacolab';
    const UPDATED_AT = 'fecha_mod_horacolab';	
}
