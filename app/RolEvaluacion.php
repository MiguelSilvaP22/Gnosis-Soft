<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RolEvaluacion extends Model
{
        protected $table = 'rolevaluacion';
        protected $primaryKey = 'id_rolevaluacion';
        const CREATED_AT = 'fecha_reg_rolevaluacion';
        const UPDATED_AT = 'fecha_mod_rolevaluacion';

        public function evaluacionDnc()
        {
        return $this->belongsTo(EvaluacionDNC::class,'id_evaluacion')->where('estado_evaluacion',1);
        }

        public function rolDesempeno()
        {
        return $this->belongsTo(RolDesempeno::class,'id_roldesempeno')->where('estado_roldesempeno',1);
        }

}

