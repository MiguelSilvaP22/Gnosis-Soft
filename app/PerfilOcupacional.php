<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerfilOcupacional extends Model
{
    protected $table = 'perfilocupacional';
    protected $primaryKey = 'id_perfilocu';
    const CREATED_AT = 'fecha_reg_perfilocu';
    const UPDATED_AT = 'fecha_mod_perfilocu';

    public function eliminar()
    {
        $this->estado_perfilocu = 0;
        $this->save();
    }
}
