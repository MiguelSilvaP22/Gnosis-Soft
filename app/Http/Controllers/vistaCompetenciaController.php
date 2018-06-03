<?php

namespace App\Http\Controllers;

use App\Competencia;
use App\CategoriaCompetencia;
use App\RolDesempeno;
use App\NivelCompetencia;

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
        $categoriascompetencias = categoriacompetencia::All()->where('estado_categoriacomp',1);
        \Debugbar::info($competencias);
        return view('vistacompetencia.index', compact('competencias','categoriascompetencias'));
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
