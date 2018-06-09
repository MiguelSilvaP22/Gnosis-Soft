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
    public function horariosColaborador()
    {
        return $this->hasMany(HorarioColaborador::class,'id_horario');
    }
    public function horariosFacilitador()
    {
        return $this->hasMany(HorarioFacilitador::class,'id_horario');
    }

    public function eliminar()
    {
        foreach($this->horariosColaborador as $horColab)
        {
            $horColab->eliminar();
        }

        foreach($this->horariosFacilitador as  $horFaci)
        {
            $horFaci->eliminar();
        }      
        $this->estado_horario = 0;
        $this->save();
    }
}
