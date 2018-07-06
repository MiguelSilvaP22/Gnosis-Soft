<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlternativaPregunta extends Model
{
    protected $table = 'alternativapregunta';
    protected $primaryKey = 'id_altvpre';
    const CREATED_AT = 'fecha_reg_altvpre';
    const UPDATED_AT = 'fecha_mod_altvpre';

    public function Alternativa()
    {
        return $this->belongsTo(Alternativa::class,'id_alternativa')->where('estado_alternativa',1);
    }
}
