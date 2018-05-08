<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comuna extends Model
{
    protected $table = 'comuna';
    protected $primaryKey = 'id_comuna';
    const CREATED_AT = 'fecha_reg_comuna';
    const UPDATED_AT = 'fecha_mod_comuna';

    public function region()
    {
        return $this->belongsTo(Region::class,'id_region');
    }
}
