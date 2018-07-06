<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreguntaEncuesta extends Model
{
    protected $table = 'preguntaencuesta';
    protected $primaryKey = 'id_preguntaencuesta';
    const CREATED_AT = 'fecha_reg_preguntaencuesta';
    const UPDATED_AT = 'fecha_mod_preguntaencuesta';

    public function pregunta()
    {
        return $this->belongsTo(Pregunta::class,'id_pregunta')->where('estado_pregunta',1);
    }
    public function encuesta()
    {
        return $this->belongsTo(Encuesta::class,'id_encuesta');
    }

    public function eliminar()
    {
        $this->pregunta->eliminar();
        $this->estado_preguntaencuesta = 0;
        $this->save();
    }
}
