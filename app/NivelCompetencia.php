<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NivelCompetencia extends Model
{
    protected $table = 'nivelcompetencia';
    protected $primaryKey = 'id_nivelcompetencia';
    const CREATED_AT = 'fecha_reg_nivelcompetencia';
    const UPDATED_AT = 'fecha_mod_nivelcompetencia';

    public function comunas()
    {
        return $this->belongsTo(Competencia::Class,'id_comp');
    }
}
