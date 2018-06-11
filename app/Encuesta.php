<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
    protected $table = 'encuesta';
    protected $primaryKey = 'id_encuesta';
    const CREATED_AT = 'fecha_reg_encuesta';
    const UPDATED_AT = 'fecha_mod_encuesta';

    public function tipoEncuesta()
    {
        return $this->belongsTo(TipoEncuesta::class,'id_tipoencuesta');
    }
    public function preguntasEncuesta()
    {
        return $this->hasMany(PreguntaEncuesta::class,'id_encuesta');
    }

    public function eliminar()
    {
        foreach($this->preguntasEncuesta as $preguntaEncuesta)
        {
            $preguntaEncuesta->eliminar();
        }
        
        $this->estado_encuesta = 0;
        $this->save();
    }
    public function eliminarPreguntasEncuesta()
    {
        foreach($this->preguntasEncuesta as $preguntaEncuesta)
        {
            $preguntaEncuesta->eliminar();
        }
    }
}
