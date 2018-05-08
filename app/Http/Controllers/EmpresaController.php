<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Region;
use App\Giro;
use App\GiroEmpresa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class EmpresaController extends Controller
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
            $empresas = Empresa::all()->where('estado_empresa',1);
        else
            $empresas = Empresa::all()->where('estado_empresa',0);
        return view('empresa.index', compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regiones = Region::All()->pluck('nombre_region','id_region');
        $giros = Giro::All()->where('estado_giro',1)->pluck('nombre_giro','id_giro');
        //dd($regiones);
       
        return view('empresa.crearEmpresa',compact('regiones','giros'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $giros = $request->id_giro;
        
        $empresa = new Empresa;
        $empresa->nombre_empresa = $request->nombre_empresa;
        $empresa->razon_social_empresa = $request->razon_social_empresa;
        $empresa->rut_matriz_empresa = $request->rut_matriz_empresa;
        $empresa->id_comuna = $request->id_comuna;
        $empresa->direccion_empresa = $request->direccion_empresa;
        $empresa->email_empresa = $request->email_empresa;
        $empresa->estado_empresa = 1;

        if($empresa->save())
        {
            foreach($giros as $giro)
            {
                $giroEmpresa = new GiroEmpresa;
                $giroEmpresa->id_giro = $giro;
                $giroEmpresa->id_empresa = $empresa->id_empresa;
                $giroEmpresa->estado_giroempresa = 1;
                $giroEmpresa->save();
            }
    
        }

        
        return redirect('index');
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
