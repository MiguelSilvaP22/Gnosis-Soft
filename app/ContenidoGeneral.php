<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContenidoGeneral extends Model
{
    protected $table = 'contenidogeneral';
    protected $primaryKey = 'id_contenidog';
    const CREATED_AT = 'fecha_reg_contenidog';
    const UPDATED_AT = 'fecha_mod_contenidog';
}
