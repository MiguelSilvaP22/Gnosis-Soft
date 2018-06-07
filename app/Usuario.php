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
        return $this->belongsTo(PerfilOcupacional::class,'id_perfilocu');
    }
    public function perfil()
    {
        return $this->belongsTo(Perfil::class,'id_perfil');
    }
     public function horariosColaborador()
    {
        return $this->hasMany(HorarioColaborador::class,'id_usuario');
    }


    public function eliminar()
    {
        if($this->id_perfil == 2)
        {
            foreach($this->horariosColaborador as  $horColab)
            {
                $horColab->eliminar();
            }
        }
        $this->estado_usuario = 0;
        $this->save();
    }
}
