<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $table = 'actividad';
    protected $primaryKey = 'id_actividad';
    const CREATED_AT = 'fecha_reg_actividad';
    const UPDATED_AT = 'fecha_mod_actividad';

    public function curso()
    {
        return $this->belongsTo(Curso::class,'id_curso');
    }
    public function horarios()
    {
        return $this->hasMany(Horario::class,'id_actividad');
    }

    public function eliminar()
    {
        foreach($this->horarios as $horario)
        {
            $horario->eliminar();
        }
        $this->estado_actividad = 0;
        $this->save();
    }
}
