<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = 'curso';
    protected $primaryKey = 'id_curso';
    const CREATED_AT = 'fecha_reg_curso';
    const UPDATED_AT = 'fecha_mod_curso';

    public function competencias()
    {
        return $this->hasMany(Competencia::Class, 'competenciacurso', 'id_curso')->where('estado_comp',1);
    }
    public function actividades()
    {
        return $this->hasMany(Actividad::Class, 'id_curso')->where('estado_actividad',1);
    }
    public function competenciasCurso()
    {
        return $this->hasMany(CompetenciaCurso::Class, 'id_curso')->where('estado_compcurso',1);
    }
    public function listacompetencias()
    {
        return $this->belongsToMany(Competencia::Class, 'competenciacurso', 'id_curso', 'id_comp')->where('estado_comp',1);
    }
    public function eliminar()
    {
        foreach($this->actividades as $actividad)
        {
            $actividad->eliminar();
        }
        foreach($this->competenciasCurso as $competencia)
        {
            $competencia->eliminar();
        }

        $this->estado_curso = 0;
        $this->save();
    }


}
