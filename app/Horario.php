<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $table = 'horario';
    protected $primaryKey = 'id_horario';
    const CREATED_AT = 'fecha_reg_horario';
    const UPDATED_AT = 'fecha_mod_horario';	

    public function actividad()
    {
        return $this->belongsTo(Actividad::class,'id_actividad');
    }
}
