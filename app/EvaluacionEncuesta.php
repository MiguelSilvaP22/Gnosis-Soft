<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EvaluacionEncuesta extends Model
{
    protected $table = 'evaluacionencuesta';
    protected $primaryKey = 'id_evencuesta';
    const CREATED_AT = 'fecha_reg_evencuesta';
    const UPDATED_AT = 'fecha_mod_evencuesta';
    
    public function encuesta()
    {
        return $this->belongsTo(Encuesta::class,'id_encuesta')->where('estado_encuesta',1);
    }
    
    public function alternativasEvaluacion()
    {
        return $this->hasMany(AlternativaEvaluacion::class,'id_evencuesta')->where('estado_altvev',1);
    }

    public function eliminar()
    {
        foreach($this->alternativasEvaluacion as $alt)
        {
            $alt->eliminar();
        }

        $this->estado_evencuesta= 0;
        $this->save();
    }
}
