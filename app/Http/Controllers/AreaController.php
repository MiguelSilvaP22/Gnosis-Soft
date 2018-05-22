<?php

namespace App\Http\Controllers;


use App\Area;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $idGerencia = $id;
        $areas = Area::all()->where('id_gerencia',$idGerencia)->where('estado_area',1);
        return view('area.index', compact('areas','idGerencia'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $idGerencia = $id;
        return view('area.crearArea', compact('idGerencia'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $area = new Area;
        $area->id_gerencia = $request->id_gerencia;
        $area->nombre_area = $request->nombre_area;
        $area->estado_area = 1;
        $area->save();
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
        $area = Area::findOrFail($id);
       
        return view('area.editarArea', compact('area'));
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
        $area = Area::findOrFail($id);
        $area->nombre_area = $request->nombre_area;
        $area->save();
    }
    public function confirmDestroy($id)
    {
        $area = Area::findOrFail($id);
        return view('area.desactivarArea', compact('area'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $area = Area::findOrFail($id);
        $area->estado_area = 0;
        $area->save();
    }
    public function selectArea($id)
    {
        $areas = Area::all()->where('id_gerencia',$id)->where('estado_area',1);
        return view('area.selectArea', compact('areas'));
    }

}
