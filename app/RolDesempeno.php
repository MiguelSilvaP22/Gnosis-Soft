<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RolDesempeno extends Model
{
    protected $table = 'roldesempeno';
    protected $primaryKey = 'id_roldesempeno';
    const CREATED_AT = 'fecha_reg_roldesempeno';
    const UPDATED_AT = 'fecha_mod_roldesempeno';

    public function comunas()
    {
        return $this->belongsTo(Competencia::Class,'id_comp');
    }
}