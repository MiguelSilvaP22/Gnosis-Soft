<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    protected $table = 'nota';
    protected $primaryKey = 'id_nota';
    const CREATED_AT = 'fecha_reg_nota';
    const UPDATED_AT = 'fecha_mod_nota';
}
