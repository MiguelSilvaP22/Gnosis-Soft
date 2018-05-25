<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nacionalidad extends Model
{
    protected $table = 'nacionalidad';
    protected $primaryKey = 'id_nacionalidad';
    const CREATED_AT = 'fecha_reg_nacionalidad';
    const UPDATED_AT = 'fecha_mod_nacionalidad';
}
