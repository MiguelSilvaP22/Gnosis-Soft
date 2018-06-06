<?php

namespace App\Http\Controllers;

use App\HorarioFacilitador;
use App\HorarioColaborador;
use App\Horario;
use App\Empresa;
use App\Usuario;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HorarioController extends Controller
{
    
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
    	$facilitadores = Usuario::all()->where('id_perfil',4)->where('estado_usuario',1)->sortBy('nombre_usuario')->pluck('nombre_usuario','id_usuario');
    	$empresas = Empresa::all()->where('estado_empresa',1)->sortBy('nombre_empresa')->pluck('nombre_empresa','id_empresa');
    	$colaboradores = Usuario::all()->where('id_perfil',2)->where('estado_usuario',1);
    	$horarioActividad = Horario::findOrFail($id);
    	return view('horario.asignarHorario', compact('horarioActividad','facilitadores','colaboradores','empresas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$facilitadores = $request->id_facilitador;
    	$colaboradores = $request->id_colaborador;
    	foreach($facilitadores as $facilitador)
    	{
    		$faci = new HorarioFacilitador();
    		$faci->id_horario = $request->id_horario;
    		$faci->id_usuario = $facilitador;
    		$faci->estado_horafaci = 1;
    		$faci->save();

    	}
    	foreach($colaboradores as $colaborador)
    	{
    		$cola = new HorarioColaborador();
    		$cola->id_horario = $request->id_horario;
    		$cola->id_usuario = $colaborador;
    		$cola->estado_horacolab = 1;
    		$cola->save();
    	}
    	return redirect('actividad');

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
