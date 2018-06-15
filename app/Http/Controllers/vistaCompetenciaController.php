<?php

namespace App\Http\Controllers;

use App\Competencia;
use App\CategoriaCompetencia;
use App\Curso;

use App\RolDesempeno;
use App\NivelCompetencia;
use App\TipoNivel;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class vistaCompetenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $competencias = Competencia::All()->where('estado_comp',1);
        $listaCompetencias =  Competencia::all()->where('estado_comp',1)->sortBy('nombre_comp')->pluck('nombre_comp','id_comp');
        $categoriascompetencias = categoriacompetencia::All()->where('estado_categoriacomp',1);
        \Debugbar::info($competencias);
        if(session()->exists('Usuario'))
        {
            if(session('Usuario')->id_perfil ==1 || session('Usuario')->id_perfil ==3 )
            {
                return view('vistacompetencia.index', compact('competencias','categoriascompetencias', 'listaCompetencias'));
            }
            else
            {
                $errorVali = "Usted no esta autorizado a ingresar a este modulo";
                return view('index.layoutindex', compact('errorVali'));
            }
            
        }
        else
        {
            $errorVali = "Usted no a ingresado al sistema";
            return view('index.layoutindex', compact('errorVali'));
        }
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function vistacompetencias($idCategoria)
    {
        $competencias = Competencia::All()->where('estado_comp',1)->where('id_categoriacomp',$idCategoria);
        \Debugbar::info($competencias);
        return view('vistacompetencia.competencias', compact('competencias'));
    }

    public function infocompetencia($idCompetencia)
    {
        $competencia = Competencia::findOrFail($idCompetencia);
        $roldesempenos = RolDesempeno::All()->where('estado_roldesempeno',1)->where('id_comp', $idCompetencia);
        $niveles = NivelCompetencia::All()->where('estado_nivelcompetencia',1)->where('id_comp', $idCompetencia)->values();
       // $cursos = Curso::All()->where('estado_curso')->where
        //$tiponivel = TipoNivel::All()->where('estado_tiponivel',1)->pluck('nombre_tiponivel');;

        //$nivelesnombre = array_merge($niveles, $tiponivel);
        \Debugbar::info($competencia->cursos);

        return view('vistacompetencia.infocompetencia', compact('competencia','roldesempenos','niveles'));
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
