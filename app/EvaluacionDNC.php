<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EvaluacionDNC extends Model
{
    protected $table = 'evaluaciondnc';
    protected $primaryKey = 'id_evaluacion';
    const CREATED_AT = 'fecha_reg_evaluacion';
    const UPDATED_AT = 'fecha_mod_evaluacion';

    public function usuario()
    {
        return $this->belongsTo(Usuario::class,'id_usuario');
    }

    public function eliminar()
    {
        $this->estado_evaluacion = 0;
        $this->save();
    }

}
