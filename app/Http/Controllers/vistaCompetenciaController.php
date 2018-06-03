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
        \Debugbar::info($competencias);
        /*
        $categoriascompetencias = categoriacompetencia::All()->where('estado_categoriacomp',1)->sortBy('nombre_caterogiacomp')->pluck('nombre_categoriacomp','id_categoriacomp');
        $roldesempenos = RolDesempeno::All()->where('estado_roldesempeno',1)->where('id_comp', $id);
        $niveles = NivelCompetencia::All()->where('estado_nivelcompetencia',1)->where('id_comp', $id)->pluck('desc_nivelcompetencia');
        \Debugbar::info($niveles);
        //return view('Competencia.verCompetencia', compact('competencia','categoriascompetencias', 'roldesempenos', 'niveles'));*/
        return view('vistacompetencia.index', compact('competencias'));
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
