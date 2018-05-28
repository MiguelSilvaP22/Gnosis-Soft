<?php

namespace App\Http\Controllers;

use App\Usuario;
use App\Nacionalidad;
use App\Empresa;
use App\PerfilOcupacional;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ColaboradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colaboradores = Usuario::all()->where('id_perfil',2)->where('estado_usuario',1);
        return view('colaborador.index', compact('colaboradores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nacionalidades = Nacionalidad::all()->where('estado_nacionalidad',1)->sortBy('nombre_nacionalidad')->pluck('nombre_nacionalidad','id_nacionalidad');

        $empresas = Empresa::all()->where('estado_empresa',1)->sortBy('nombre_empresa')->pluck('nombre_empresa','id_empresa');
        
        return view('colaborador.crearColaborador', compact('nacionalidades','empresas'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $colaborador = new Usuario;
        $colaborador->id_perfil = 2; //Por defecto el id 2 sera colaborador;
        $colaborador->id_perfilocu = $request->id_perfilocu;
        $colaborador->run_usuario = $request->run_usuario;
        $colaborador->nombre_usuario = $request->nombre_usuario; 
        $colaborador->fechana_usuario = $request->fechana_usuario;
        $colaborador->apellidopat_usuario = $request->apellidopat_usuario;
        $colaborador->apellidomat_usuario = $request->apellidomat_usuario;
        $colaborador->sexo_usuario = $request->sexo_usuario;
        $colaborador->email_usuario = $request->email_usuario;
        $colaborador->estado_usuario = 1;
        $colaborador->clave_usuario = mb_substr($request->run_usuario, 0, 4);
        $colaborador->save();
        return redirect('empresa');

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
