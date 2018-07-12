<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table = 'region';
    protected $primaryKey = 'id_region';
    const CREATED_AT = 'fecha_reg_region';
    const UPDATED_AT = 'fecha_mod_region';

    public function comunas()
    {
        return $this->hasMany(Comuna::class,'id_region')->where('estado_comuna',1);
    }
}
