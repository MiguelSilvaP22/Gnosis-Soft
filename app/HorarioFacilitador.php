<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HorarioFacilitador extends Model
{
    protected $table = 'horariofacilitador';
    protected $primaryKey = 'id_horafaci';
    const CREATED_AT = 'fecha_reg_horafaci';
    const UPDATED_AT = 'fecha_mod_horafaci';	

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
        $this->estado_horafaci = 0;
        $this->save();
    }
}
