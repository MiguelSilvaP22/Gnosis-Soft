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
        return $this->belongsTo(Horario::class,'id_horario');
    }
    public function usuario()
    {
        return $this->belongsTo(Usuario::class,'id_usuario');
    }

    public function eliminar()
    {
        $this->estado_horacolab = 0;
        $this->save();
    }
}
