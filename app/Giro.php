<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Giro extends Model
{
    protected $table = 'giro';
    protected $primaryKey = 'id_giro';
    const CREATED_AT = 'fecha_reg_giro';
    const UPDATED_AT = 'fecha_mod_giro';
}
