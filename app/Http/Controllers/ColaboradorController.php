<?php

namespace App\Http\Controllers;

use App\Usuario;
use App\Nacionalidad;
use App\Empresa;
use App\Gerencia;
use App\Area;
use App\PerfilOcupacional;

use DB;
use App\Quotation;
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
        return redirect('colaborador');

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
        $colaborador = Usuario::findOrFail($id);
        $nacionalidades = Nacionalidad::all()->where('estado_nacionalidad',1)->sortBy('nombre_nacionalidad')->pluck('nombre_nacionalidad','id_nacionalidad');
        $empresas = Empresa::all()->where('estado_empresa',1)->sortBy('nombre_empresa')->pluck('nombre_empresa','id_empresa');
        $gerencias = Gerencia::all()->where('estado_gerencia',1)->where('id_empresa',$colaborador->perfilOcupacional->area->gerencia->empresa->id_empresa)->sortBy('nombre_gerencia')->pluck('nombre_gerencia','id_gerencia');
        $areas = Area::all()->where('estado_area',1)->where('id_gerencia',$colaborador->perfilOcupacional->area->gerencia->id_gerencia)->sortBy('nombre_area')->pluck('nombre_area','id_area');
        $perfilesOcu = PerfilOcupacional::all()->where('estado_perfilocu',1)->where('id_area',$colaborador->perfilOcupacional->area->id_area)->sortBy('nombre_perfilocu')->pluck('nombre_perfilocu','id_perfilocu');

        return view('colaborador.editarColaborador', compact('colaborador','nacionalidades','empresas','gerencias','areas','perfilesOcu'));
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
        $colaborador = Usuario::findOrFail($id);
        $colaborador->id_perfilocu = $request->id_perfilocu;
        $colaborador->run_usuario = $request->run_usuario;
        $colaborador->nombre_usuario = $request->nombre_usuario; 
        //$colaborador->fechana_usuario = $request->fechana_usuario;
        $colaborador->apellidopat_usuario = $request->apellidopat_usuario;
        $colaborador->apellidomat_usuario = $request->apellidomat_usuario;
        $colaborador->sexo_usuario = $request->sexo_usuario;
        $colaborador->email_usuario = $request->email_usuario;
        $colaborador->save();
        return redirect('colaborador');

    }

     public function confirmDestroy($id)
    {
        $colaborador = Usuario::findOrFail($id);
        return view('colaborador.desactivarColaborador', compact('colaborador'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $colaborador = Usuario::findOrFail($id);
        $colaborador->eliminar();
        return redirect('colaborador');
    }
    public function selectColaboradores($id)
    {
        $colaboradores = DB::table('usuario')
            ->join('perfilocupacional', 'usuario.id_perfilocu', '=', 'perfilocupacional.id_perfilocu')
            ->join('area', 'perfilocupacional.id_area', '=', 'area.id_area')
            ->join('gerencia', 'area.id_gerencia', '=', 'gerencia.id_gerencia')
            ->join('empresa', 'gerencia.id_empresa', '=', 'empresa.id_empresa')
            ->where('empresa.id_empresa',$id)
            ->where('usuario.id_perfil',2)
            ->where('usuario.estado_usuario',1)
            ->select('usuario.*')
            ->get()
            ->sortBy('nombre_usuario')
            ->pluck('run_usuario','id_usuario');
        return view('colaborador.selectColaboradores', compact('colaboradores'));
    }


    public function indexVista()
    {
        $colaboradores = Usuario::all()->where('id_perfil',2)->where('estado_usuario',1);
        return view('vistaColaborador.index', compact('colaboradores'));
    }

    public function showVista($id)
    {
        
        $colaborador = Usuario::findOrFail($id);
        \Debugbar::info($colaborador->perfilOcupacional->area->gerencia);

        return view('vistaColaborador.detalle', compact('colaborador'));
    }
}
