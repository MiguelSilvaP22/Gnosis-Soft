<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    //
    protected $table = 'perfil';
    protected $primaryKey = 'id_perfil';
    const CREATED_AT = 'fecha_reg_perfil';
    const UPDATED_AT = 'fecha_mod_perfil';
}
