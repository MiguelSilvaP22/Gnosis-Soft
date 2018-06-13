<?php

namespace App\Http\Controllers;


use App\Actividad;
use App\Curso;
use App\Horario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {     
        if($id == null )
        {
            $actividades = Actividad::all()->where('estado_actividad',1); 
        }
        else
        {
            $actividades = Actividad::all()->where('id_curso',$id)->where('estado_actividad',1);
        }
       //dd($actividades);
        $idCurso = $id;
        return view('actividad.index', compact('actividades','idCurso'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $cursos = Curso::all()->where('estado_curso',1)->sortBy('nombre_curso')->pluck('nombre_curso','id_curso');
        $idCurso = $id;
        return view('actividad.crearActividad', compact('cursos','idCurso'));
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

    public function createHorario($id)
    {
        $actividad = Actividad::findOrFail($id);
        $horarios = Horario::all()->where('id_actividad',$id)->where('estado_horario',1);
        return view('actividad.crearHorario', compact('actividad','horarios'));

    }
    public function formHorario($id)
    {
        $idForm = $id;
        return view('actividad.formHorario', compact('idForm'));

    }

    public function storeHorario(Request $request)
    {
        for($x=0; $x<Count($request->fecha_horario);$x++)
        {   
            $horario = new Horario;
            $horario->id_actividad = $request->id_actividad;
            $horario->hora_inicio_horario = $request->hora_inicio_horario[$x];
            $horario->hora_termino_horario = $request->hora_termino_horario[$x];
            $horario->fecha_horario = $request->fecha_horario[$x];
            $horario->estado_horario = 1;
            $horario->save();
        }
        return redirect('actividad');
    }
    public function updateHorario(Request $request)
    {
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
        $actividad = Actividad::findOrFail($id);
        $cursos = Curso::all()->where('estado_curso',1)->sortBy('nombre_curso')->pluck('nombre_curso','id_curso');
        return view('actividad.editarActividad', compact('actividad','cursos'));
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
        $actividad = Actividad::findOrFail($id);
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

    public function confirmDestroy($id)
    {
        
        $actividad = Actividad::findOrFail($id);
        return view('actividad.desactivarActividad', compact('actividad'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $actividad = Actividad::findOrFail($id);
        $actividad->eliminar();
        return redirect('actividad');
    }
}
