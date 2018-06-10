<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categoria';
    protected $primaryKey = 'id_categoria';
    const CREATED_AT = 'fecha_reg_categoria';
    const UPDATED_AT = 'fecha_mod_categoria';
}
