<?php

namespace App\Http\Controllers;

use App\PerfilOcupacional;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PerfilOcupacionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idArea = $id;
        $perfilesOcu = PerfilOcupacional::all()->where('id_area',$idArea)->where('estado_perfilocu',1);
        return view('perfilOcupacional.index', compact('perfilesOcu','idArea'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $idArea = $id;
        //$categoriasCompetencias = categoriacompetencia::All()->where('estado_categoriacomp',1)->sortBy('nombre_caterogiacomp')->pluck('nombre_categoriacomp','id_categoriacomp');
        $competencias = Competencias::All()->where('estado_comp',1)->sortBy('nombre_comp')->pluck('nombre_comp','id_comp');
        return view('perfilOcupacional.crearPerfilOcupacional', compact('idArea','competencias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $perfilOcu = new Area;
        $perfilOcu->id_area = $request->id_area;
        $perfilOcu->nombre_perfilocu = $request->nombre_perfilocu;
        $perfilOcu->estado_perfilocu = 1;
        $perfilOcu->save();
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
        $perfilOcu = PerfilOcupacional::findOrFail($id);
       
        return view('perfilOcupacional.editarPerfilOcupacional', compact('perfilOcu'));
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
        $perfilOcu = PerfilOcupacional::findOrFail($id);
        $perfilOcu->nombre_perfilocu = $request->nombre_perfilocu;
        $perfilOcu->save();
    }
    public function confirmDestroy($id)
    {
        $perfilOcu = PerfilOcupacional::findOrFail($id);
        return view('perfilOcupacional.desactivarPerfilOcupacional', compact('perfilOcu'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $perfilOcu = PerfilOcupacional::findOrFail($id);
        $perfilOcu->estado_perfilocu = 0;
        $perfilOcu->save();
    }
}
