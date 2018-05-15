<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'area';
    protected $primaryKey = 'id_area';
    const CREATED_AT = 'fecha_reg_area';
    const UPDATED_AT = 'fecha_mod_area';
}
