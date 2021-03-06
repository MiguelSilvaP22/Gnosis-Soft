<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerfilOcupacional extends Model
{
    protected $table = 'perfilocupacional';
    protected $primaryKey = 'id_perfilocu';
    const CREATED_AT = 'fecha_reg_perfilocu';
    const UPDATED_AT = 'fecha_mod_perfilocu';

    public function area()
    {
        return $this->belongsTo(Area::class,'id_area')->where('estado_area',1);
    }

    public function competencias()
    {
        return $this->belongsToMany(Competencia::Class, 'competenciaperfil', 'id_perfilocu', 'id_comp')->where('estado_comp',1);

    }
}
