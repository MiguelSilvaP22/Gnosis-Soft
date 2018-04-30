<?php

namespace App\Http\Controllers;


use App\Perfil;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($estado = null)
    {   
        //dd($estado);    
        if($estado!="0")
            $perfiles = Perfil::all()->where('estado_perfil',1);
        else
            $perfiles = Perfil::all()->where('estado_perfil',0);
        return view('perfil.perfil', compact('perfiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('perfil.crearPerfil');
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$perfil = new Perfil;
        $perfil->nombre_perfil = 'Empresa';
        $perfil->estado_perfil = 1;
        $perfil->save();*/

        //Crear un perfil,
        
        $perfil = new Perfil;
        $perfil->nombre_perfil = $request->nombre_perfil;
        $perfil->estado_perfil = 1;
        $perfil->save();

     
        return redirect('perfil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $perfil = Perfil::find($id);
        if($perfil->estado_perfil == 1)
            $estado="Activo";
        else
            $estado="Inactivo";
        return view('perfil.verPerfil',compact('perfil','estado') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $perfil = Perfil::findOrFail($id);
        return view('perfil.editarPerfil',['perfil' => $perfil] );
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
        $perfil = Perfil::findOrFail($id);
        $perfil->nombre_perfil = $request->nombre_perfil;
        $perfil->estado_perfil = $request->estado_perfil;
        $perfil->save();
        return redirect('perfil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        
        $perfil = Perfil::find($id);
        $perfil->estado_perfil = 0;
        $perfil->save();
        return redirect('perfil');
    }
}
