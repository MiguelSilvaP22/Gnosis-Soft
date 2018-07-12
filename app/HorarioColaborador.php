<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HorarioColaborador extends Model
{
    protected $table = 'horariocolaborador';
    protected $primaryKey = 'id_horacolab';
    const CREATED_AT = 'fecha_reg_horacolab';
    const UPDATED_AT = 'fecha_mod_horacolab';	

    public function horario()
    {
        return $this->belongsTo(Horario::class,'id_horario')->where('estado_horario',1);
    }
    public function usuario()
    {
        return $this->belongsTo(Usuario::class,'id_usuario')->where('estado_usuario',1);
    }
    public function evaluacionesColab()
    {
        return $this->hasMany(EvaluacionColab::class,'id_horacolab')->where('estado_evcolab',1);
    }

    public function eliminar()
    {
        foreach($evaluacionesColab as $evColab)
        {
            $evColab->eliminar();
        }
        $this->estado_horacolab = 0;
        $this->save();
    }
}
