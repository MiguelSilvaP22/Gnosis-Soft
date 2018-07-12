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
        return $this->belongsTo(CategoriaCompetencia::Class,'id_categoriacomp')->where('estado_categoriacomp',1);
    }

    public function rolDesempenos()
    {
        return $this->hasMany(RolDesempeno::Class, 'id_comp')->where('estado_roldesempeno',1);
    }

    public function cursos()
    {
        return $this->belongsToMany(Curso::Class, 'competenciacurso', 'id_comp', 'id_curso')->where('estado_curso',1);
    }
}
