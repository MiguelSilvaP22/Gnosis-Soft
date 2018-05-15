<?php

namespace App\Http\Controllers;

use App\Gerencia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GerenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $idEmpresa = $id;
        $gerencias = Gerencia::all()->where('id_empresa',$idEmpresa)->where('estado_gerencia',1);
        return view('gerencia.index', compact('gerencias','idEmpresa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $idEmpresa = $id;
        return view('gerencia.crearGerencia', compact('idEmpresa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->id_empresa);
        $gerencia = new Gerencia;
        $gerencia->id_empresa = $request->id_empresa;
        $gerencia->nombre_gerencia = $request->nombre_gerencia;
        $gerencia->estado_gerencia = 1;
        $gerencia->save();
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
        $gerencia = Gerencia::findOrFail($id);
        return view('gerencia.editarGerencia', compact('gerencia'));
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
        $gerencia = Gerencia::findOrFail($id);
        $gerencia->nombre_gerencia = $request->nombre_gerencia;
        $gerencia->save();
        
    }
    public function confirmDestroy($id)
    {
        $gerencia = Gerencia::findOrFail($id);
        return view('gerencia.desactivarGerencia', compact('gerencia'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

   
    public function destroy($id)
    {
        $gerencia = Gerencia::findOrFail($id);
        $gerencia->estado_gerencia = 0;
        $gerencia->save();
    }
}
