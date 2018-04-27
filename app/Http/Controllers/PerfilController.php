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
    public function index()
    {
        
        $perfiles = Perfil::all();
        
        return view('perfil.perfil', ['perfiles' => $perfiles]);
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

        echo $perfil->nombre_perfil;
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
        
        $perfil = Perfil::find($id);
        $perfil->estado_perfil = 0;
        $perfil->save();
        return redirect('perfil');
    }
}
