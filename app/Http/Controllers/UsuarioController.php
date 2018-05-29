<?php

namespace App\Http\Controllers;

use App\Usuario;
use App\Perfil;
use App\Nacionalidad;
use App\Empresa;
use App\PerfilOcupacional;  
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::all()->where('estado_usuario',1);
        return view('usuario.index', compact('usuarios'));
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
        $perfiles = Perfil::all()->where('estado_perfil',1)->sortBy('nombre_perfil')->pluck('nombre_perfil','id_perfil');

        return view('usuario.crearUsuario', compact('nacionalidades','empresas','perfiles'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuario = new Usuario;
        $usuario->id_perfilocu = $request->id_perfilocu;
        $usuario->id_perfil = $request->id_perfil; 
        $usuario->run_usuario = $request->run_usuario;
        $usuario->nombre_usuario = $request->nombre_usuario; 
        $usuario->fechana_usuario = $request->fechana_usuario;
        $usuario->apellidopat_usuario = $request->apellidopat_usuario;
        $usuario->apellidomat_usuario = $request->apellidomat_usuario;
        $usuario->sexo_usuario = $request->sexo_usuario;
        $usuario->email_usuario = $request->email_usuario;
        $usuario->estado_usuario = 1;
        $usuario->clave_usuario = mb_substr($request->run_usuario, 0, 4);
        $usuario->save();
        return redirect('usuario');
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
        $usuario = Usuario::findOrFail($id);
        $nacionalidades = Nacionalidad::all()->where('estado_nacionalidad',1)->sortBy('nombre_nacionalidad')->pluck('nombre_nacionalidad','id_nacionalidad');
        $empresas = Empresa::all()->where('estado_empresa',1)->sortBy('nombre_empresa')->pluck('nombre_empresa','id_empresa');
        $perfiles = Perfil::all()->where('estado_perfil',1)->sortBy('nombre_perfil')->pluck('nombre_perfil','id_perfil');
        return view('usuario.editarUsuario', compact('usuario','nacionalidades','empresas','perfiles'));
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
        $usuario = Usuario::findOrFail($id);
        $usuario->id_perfilocu = $request->id_perfilocu;     
        $usuario->id_perfil = $request->id_perfil; 
        $usuario->run_usuario = $request->run_usuario;
        $usuario->nombre_usuario = $request->nombre_usuario; 
        //$usuario->fechana_usuario = $request->fechana_usuario;
        $usuario->apellidopat_usuario = $request->apellidopat_usuario;
        $usuario->apellidomat_usuario = $request->apellidomat_usuario;
        $usuario->sexo_usuario = $request->sexo_usuario;
        $usuario->email_usuario = $request->email_usuario;
        $usuario->save();
        return redirect('usuario');
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
