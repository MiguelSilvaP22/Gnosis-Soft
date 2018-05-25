<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'area';
    protected $primaryKey = 'id_area';
    const CREATED_AT = 'fecha_reg_area';
    const UPDATED_AT = 'fecha_mod_area';

    public function gerencia()
    {
        return $this->belongsTo(Gerencia::class,'id_gerencia');
    }

    public function eliminar()
    {
        $this->estado_area = 0;
        if($this->save())
        {
            PerfilOcupacional::where('id_area',$this->id_area)->update( ['estado_perfilocu' => 0]);
        }
    }
}
