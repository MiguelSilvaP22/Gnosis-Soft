<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    protected $table = 'pregunta';
    protected $primaryKey = 'id_pregunta';
    const CREATED_AT = 'fecha_reg_pregunta';
    const UPDATED_AT = 'fecha_mod_pregunta';

    public function preguntasEncuesta()
    {
        return $this->hasMany(PreguntaEncuesta::class,'id_pregunta');
    }

    public function alternativasPregunta()
    {
        return $this->hasMany(AlternativaPregunta::class,'id_pregunta')->where('estado_altvpre',1);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class,'id_categoria');
    }

    public function eliminar()
    {
        $this->estado_pregunta = 0;
        $this->save();
    }
}
