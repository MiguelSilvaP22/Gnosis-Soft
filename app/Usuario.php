<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    //

    protected $table = 'usuario';
    protected $primaryKey = 'id_usuario';
    const CREATED_AT = 'fecha_reg_usuario';
    const UPDATED_AT = 'fecha_mod_usuario';

    public function perfilOcupacional()
    {
        return $this->belongsTo(PerfilOcupacional::class,'id_perfilocu')->where('estado_perfilocu',1);
    }
    public function perfil()
    {
        return $this->belongsTo(Perfil::class,'id_perfil')->where('estado_perfil',1);
    }
    public function horariosColaborador()
    {
        return $this->hasMany(HorarioColaborador::class,'id_usuario')->where('estado_horacolab',1);
    }
    public function horariosFacilitador()
    {
        return $this->hasMany(HorarioFacilitador::class,'id_usuario')->where('estado_horafaci',1);
    }
    public function evaluacionDNC()
    {
        return $this->hasMany(EvaluacionDNC::class,'id_usuario')->where('estado_evaluacion',1);
    }


    public function eliminar()
    {
       
        if($this->id_perfil == 2)
        {
            foreach($this->horariosColaborador as $horColab)
            {
                $horColab->eliminar();
            }
            foreach($this->evaluacionDNC as  $evaluacion)
            {
                $evaluacion->eliminar();
            }
        }
        if($this->id_perfil == 4)
        {
            foreach($this->horariosFacilitador as  $horFaci)
            {
                $horFaci->eliminar();
            }
        }
        $this->estado_usuario = 0;
        $this->save();
    }
}
