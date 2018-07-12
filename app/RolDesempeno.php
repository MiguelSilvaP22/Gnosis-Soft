<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RolDesempeno extends Model
{
    protected $table = 'roldesempeno';
    protected $primaryKey = 'id_roldesempeno';
    const CREATED_AT = 'fecha_reg_roldesempeno';
    const UPDATED_AT = 'fecha_mod_roldesempeno';

    public function rolEvaluaciones()
    {
        return $this->hasMany(RolEvaluacion::Class, 'id_roldesempeno')->where('estado_roldesempeno',1);
    }
    public function competencia()
    {
        return $this->belongsTo(Competencia::Class, 'id_comp')->where('estado_comp',1);
    }


}
