<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modalidad extends Model
{
    protected $table = 'modalidad';
    protected $primaryKey = 'id_modalidad';
    const CREATED_AT = 'fecha_reg_modalidad';
    const UPDATED_AT = 'fecha_mod_modalidad';
}
