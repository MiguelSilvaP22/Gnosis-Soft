<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresa';
    protected $primaryKey = 'id_empresa';
    const CREATED_AT = 'fecha_reg_empresa';
    const UPDATED_AT = 'fecha_mod_empresa';

    public function gerencias()
    {
        return $this->hasMany(Gerencia::class,'id_empresa');
    }

    public function eliminar()
    {
        $this->estado_empresa= 0;
        if($this->save())
        {
            foreach($this->gerencias as $gerencia)
            {
                $gerencia->eliminar();
            }
        }
    }
    public function getFullNameAttribute()
    {
        return $this->nombre_empresa . ' (' . $this->rut_matriz_empresa.')';
    }
}
