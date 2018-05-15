<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaCompetencia extends Model
{
    protected $table = 'categoriacompetencia';
    protected $primaryKey = 'id_categoriacomp';
    const CREATED_AT = 'fecha_reg_categoriacomp';
    const UPDATED_AT = 'fecha_mod_categoriacomp';
}
