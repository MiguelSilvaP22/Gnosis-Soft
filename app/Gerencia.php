<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gerencia extends Model
{
    protected $table = 'gerencia';
    protected $primaryKey = 'id_gerencia';
    const CREATED_AT = 'fecha_reg_gerencia';
    const UPDATED_AT = 'fecha_mod_gerencia';

    public function empresa()
    {
        return $this->belongsTo(Empresa::class,'id_empresa')->where('estado_empresa',1);
    }
    public function areas()
    {
        return $this->hasMany(Area::class,'id_gerencia')->where('estado_area',1);
    }

    public function eliminar()
    {
        $this->estado_gerencia= 0;
        if($this->save())
        {
            foreach($this->areas as $area)
            {
                $area->eliminar();
            }
        }
    }
}
