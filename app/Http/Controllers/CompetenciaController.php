<?php

namespace App\Http\Controllers;

use App\Competencia;
use App\CategoriaCompetencia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompetenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $competencias = Competencia::all()->where('estado_comp',1);
        return view('competencia.index', compact('competencias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoriascompetencias = categoriacompetencia::All()->where('estado_categoriacomp',1)->sortBy('nombre_caterogiacomp')->pluck('nombre_categoriacomp','id_categoriacomp');
        //dd($categoriascompetencias);
        return view('competencia.crearCompetencia',compact('categoriascompetencias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $competencia = new competencia;
        $competencia->nombre_comp = $request->nombre_comp;
        $competencia->desc_comp = $request->desc_comp;
        $competencia->id_categoriacomp = $request->id_categoriacomp;
        $competencia->estado_comp = 1;
        
        if($competencia->save())
        {
            return redirect('competencia');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $competencia = Competencia::findOrFail($id);
        $categoriascompetencias = categoriacompetencia::All()->where('estado_categoriacomp',1)->sortBy('nombre_caterogiacomp')->pluck('nombre_categoriacomp','id_categoriacomp');
        return view('Competencia.verCompetencia', compact('competencia','categoriascompetencias'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $competencia = Competencia::findOrFail($id);
        $categoriascompetencias = categoriacompetencia::All()->where('estado_categoriacomp',1)->sortBy('nombre_caterogiacomp')->pluck('nombre_categoriacomp','id_categoriacomp');
        return view('Competencia.editarCompetencia', compact('competencia','categoriascompetencias'));
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
        $competencia = Competencia::findOrFail($id);
        $competencia->nombre_comp = $request->nombre_comp;
        $competencia->desc_comp = $request->desc_comp;
        $competencia->id_categoriacomp = $request->id_categoriacomp;

        if($competencia->save())
        {
            return redirect('competencia');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $competencia = Competencia::findOrFail($id);
        $competencia->estado_comp = 0;
        if($competencia->save())
        {
            return redirect('competencia');
        }
    }
}
