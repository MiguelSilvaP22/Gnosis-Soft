<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competencia extends Model
{
    protected $table = 'competencia';
    protected $primaryKey = 'id_comp';
    const CREATED_AT = 'fecha_reg_comp';
    const UPDATED_AT = 'fecha_mod_comp';

    public function categoriaCompetencia()
    {
        return $this->belongsTo(CategoriaCompetencia::Class,'id_categoriacomp');
    }
}
