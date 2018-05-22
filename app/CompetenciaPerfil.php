<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompetenciaPerfil extends Model
{
    protected $table = 'competenciaperfil';
    protected $primaryKey = 'id_comperfil';
    const CREATED_AT = 'fecha_reg_comperfil';
    const UPDATED_AT = 'fecha_mod_comperfil';
}
