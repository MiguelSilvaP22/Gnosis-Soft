<?php

namespace App\Http\Controllers;


use App\Actividad;
use App\Curso;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actividades = Actividad::all()->where('estado_actividad',1);

        return view('actividad.index', compact('actividades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cursos = Curso::all()->where('estado_curso',1)->sortBy('nombre_curso')->pluck('nombre_curso','id_curso');
        return view('actividad.crearActividad', compact('cursos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $actividad = new Actividad;
        $actividad->id_curso = $request->id_curso;
        $actividad->cod_interno_actividad = $request->cod_interno_actividad;
        $actividad->cod_sence_actividad  = $request->cod_sence_actividad;
        $actividad->lugar_realizacion_actividad  = $request->lugar_realizacion_actividad;
        $actividad->observacion_actividad  = $request->observacion_actividad;
        $actividad->fecha_inicio_actividad  = $request->fecha_inicio_actividad;
        $actividad->fecha_termino_actividad  = $request->fecha_termino_actividad;
        $actividad->estado_actividad  = 1;
        $actividad->save();
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
