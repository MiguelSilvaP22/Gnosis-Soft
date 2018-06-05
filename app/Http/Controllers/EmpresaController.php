<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\HoldingEmpresa;
use App\Region;
use App\Comuna;
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
        $regiones = Region::All()->sortBy('nombre_region')->pluck('nombre_region','id_region');
        $giros = Giro::All()->where('estado_giro',1)->sortBy('nombre_giro')->pluck('nombre_giro','id_giro');
        $empresas = Empresa::All()->where('estado_empresa',1)->sortBy('nombre_empresa')->pluck('nombre_empresa','id_empresa');
        $comunas = Comuna::All()->sortBy('nombre_comuna')->pluck('nombre_comuna','id_comuna');
        //dd($regiones);
       
        return view('empresa.crearEmpresa',compact('regiones','giros','empresas','comunas'));
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
        $empresas = $request->id_empresa;

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
            if($empresas != null)
            {
                foreach($empresas as $emp)
                {
                    $holdingEmpresa = new HoldingEmpresa;
                    $holdingEmpresa->id_empresa = $emp;
                    $holdingEmpresa->emp_id_empresa = $empresa->id_empresa;
                    $holdingEmpresa->estado_holdingempresa = 1;
                    $holdingEmpresa->save();
                }
            }
            
        }

        
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
        $empresa = Empresa::findOrFail($id);
        $giros = Giro::All()->where('estado_giro',1)->pluck('nombre_giro','id_giro')->sortBy('nombre_giro');
        $regiones = Region::All()->pluck('nombre_region','id_region')->sortBy('nombre_region');
        $empresas = Empresa::All()->where('estado_empresa',1)->pluck('nombre_empresa','id_empresa')->sortBy('nombre_empresa');
        $comunas = Comuna::All()->sortBy('nombre_comuna')->pluck('nombre_comuna','id_comuna');

        //id de otras tablas relacionadas a la empresa.
        $girosEmpresa = GiroEmpresa::All()->where('id_empresa',$empresa->id_empresa)->where('estado_giroempresa',1)->pluck('id_giro');
        $comuna = Comuna::findOrFail($empresa->id_comuna);
        $idRegion = $comuna->id_region;
        $empresasHolding =HoldingEmpresa::All()->where('emp_id_empresa',$empresa->id_empresa)->where('estado_holdingempresa',1)->pluck('id_empresa');
        

        return view('empresa.editarEmpresa',compact('empresa','giros','regiones','empresas','comunas','girosEmpresa','idRegion','empresasHolding'));
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
        $empresa = Empresa::findOrFail($id);
        $giros = $request->id_giro;
        $empresas = $request->id_empresa;
        
        $empresa->nombre_empresa = $request->nombre_empresa;
        $empresa->razon_social_empresa = $request->razon_social_empresa;
        $empresa->rut_matriz_empresa = $request->rut_matriz_empresa;
        $empresa->id_comuna = $request->id_comuna;
        $empresa->direccion_empresa = $request->direccion_empresa;
        $empresa->email_empresa = $request->email_empresa;
        $empresa->estado_empresa = 1;

        if($empresa->save())
        {
            
            GiroEmpresa::where('id_empresa',$empresa->id_empresa)->update( ['estado_giroempresa' => 0]);
            HoldingEmpresa::where('emp_id_empresa',$empresa->id_empresa)->update( ['estado_holdingempresa' => 0]);

            foreach($giros as $giro)
            {
                $girosEmpresa = GiroEmpresa::All()->where('id_empresa',$empresa->id_empresa)->where('id_giro',$giro)->first();
                if($girosEmpresa != null)
                {
                    $girosEmpresa->estado_giroempresa = 1;
                    $girosEmpresa->save();

                }
                else
                {
                    $giroEmpresa = new GiroEmpresa;
                    $giroEmpresa->id_giro = $giro;
                    $giroEmpresa->id_empresa = $empresa->id_empresa;
                    $giroEmpresa->estado_giroempresa = 1;
                    $giroEmpresa->save();
                }

            }
            if($empresas != null)
            {
                foreach($empresas as $emp)
                {
                    $empresasHolding =HoldingEmpresa::All()->where('emp_id_empresa',$empresa->id_empresa)->where('id_empresa',$emp)->first();
                    if($empresasHolding != null)
                    {
                        $empresasHolding->estado_holdingempresa = 1;
                        $empresasHolding->save();
    
                    }
                    else
                    {
                        $holdingEmpresa = new HoldingEmpresa;
                        $holdingEmpresa->id_empresa = $emp;
                        $holdingEmpresa->emp_id_empresa = $empresa->id_empresa;
                        $holdingEmpresa->estado_holdingempresa = 1;
                        $holdingEmpresa->save();
                    }
                }
            }
            
        }
    
        return redirect('empresa');
    }
    public function confirmDestroy($id)
    {
        $empresa = Empresa::findOrFail($id);
        return view('empresa.desactivarEmpresa', compact('empresa'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empresa = Empresa::findOrFail($id);
        $empresa->eliminar();
        return redirect('empresa');
    }

    public function validarNombre($nombre)
    {
        $empresa = Empresa::All()->where('nombre_empresa',$nombre)->first();
        
        if($empresa != null)
        {
            return 'false';
        }
        else
        {
            return 'true';
        }
      
    }
}
