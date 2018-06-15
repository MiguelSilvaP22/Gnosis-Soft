<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EvaluacionColab extends Model
{
    protected $table = 'evaluacioncolab';
    protected $primaryKey = 'id_evcolab';
    const CREATED_AT = 'fecha_reg_evcolab';
    const UPDATED_AT = 'fecha_mod_evcolab';

    public function eliminar()
    {
        $this->estado_evcolab= 0;
        $this->save();
    }
}
