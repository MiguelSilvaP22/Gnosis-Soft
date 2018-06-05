<?php

namespace App\Http\Controllers;

use App\Curso;
use App\Modalidad;
use App\AreaCurso;
use App\Competencia;
use App\CompetenciaCurso;
use App\ContenidoGeneral;


use App\CategoriaCompetencia;

use App\RolDesempeno;
use App\NivelCompetencia;
use App\TipoNivel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class vistaCursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areaCursos = AreaCurso::All()->where('estado_areacurso',1);
        $competencias = Competencia::All()->where('estado_comp',1);
        $listaCompetencias =  Competencia::all()->where('estado_comp',1)->sortBy('nombre_comp')->pluck('nombre_comp','id_comp');
        $categoriascompetencias = categoriacompetencia::All()->where('estado_categoriacomp',1);
        \Debugbar::info($areaCursos);
        return view('vistacurso.index', compact('competencias','areaCursos', 'listaCompetencias'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function vistacursos($idArea)
    {
        $cursos = Curso::All()->where('estado_curso',1)->where('id_areacurso',$idArea);
        \Debugbar::info($cursos);
        return view('vistacurso.cursos', compact('cursos'));
    }

    public function infocurso($idCurso)
    {
        $curso = Curso::findOrFail($idCurso);
        $area = AreaCurso::findOrFail($curso->id_areacurso);
        $modalidad = Modalidad::findOrFail($curso->id_modalidad);

       /* $competencia = Competencia::findOrFail($idCompetencia);
        $roldesempenos = RolDesempeno::All()->where('estado_roldesempeno',1)->where('id_comp', $idCompetencia);
        $niveles = NivelCompetencia::All()->where('estado_nivelcompetencia',1)->where('id_comp', $idCompetencia)->values();
       // $cursos = Curso::All()->where('estado_curso')->where*/
        //$tiponivel = TipoNivel::All()->where('estado_tiponivel',1)->pluck('nombre_tiponivel');;

        //$nivelesnombre = array_merge($niveles, $tiponivel);
        \Debugbar::info($curso->competencias);

        return view('vistacurso.infocurso', compact('curso','area', 'modalidad'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
