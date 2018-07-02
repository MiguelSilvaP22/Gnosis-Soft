<?php

namespace App\Http\Controllers;

use App\EvaluacionEncuesta;

use DB;
use App\Quotation;
use Illuminate\Http\Request;


class EvaluarEncuestaController extends Controller
{
    public function index()
    {
        $encuestasColaborador = DB::table('encuesta')
                ->join('evaluacionencuesta', 'encuesta.id_encuesta', '=', 'evaluacionencuesta.id_encuesta')
                ->join('horariocolaborador', 'evaluacionencuesta.id_horacolab', '=', 'horariocolaborador.id_horacolab')
                ->join('horario', 'horariocolaborador.id_horario', '=', 'horario.id_horario')
                ->join('actividad', 'horario.id_actividad', '=', 'actividad.id_actividad')
                ->join('curso', 'actividad.id_curso', '=', 'curso.id_curso')
                ->where('horariocolaborador.id_usuario',session('Usuario')->id_usuario)
                ->where('evaluacionencuesta.estado_evencuesta',1)
                ->where('encuesta.estado_encuesta',1)
                ->where('actividad.estado_actividad',1)
                ->where('horariocolaborador.estado_horacolab',1)
                ->where('curso.estado_curso',1)
                ->select(
                'encuesta.nombre_encuesta',
                'evaluacionencuesta.id_evencuesta',
                'evaluacionencuesta.id_horacolab',
                'horario.fecha_horario',
                'curso.nombre_curso',
                'actividad.id_actividad',
                'actividad.cod_interno_actividad'
                )->get();
        return view('evaluarEncuesta.index',compact('encuestasColaborador'));
    }

    public function create($id)
    {
        $evaluacionColaborador = EvaluacionEncuesta::findOrFail($id);
        //dd($evaluacionColaborador->Encuesta->preguntasEncuesta[0]->pregunta->alternativasPregunta[0]->alternativa);
        return view('evaluarEncuesta.evaluarEncuesta',compact('evaluacionColaborador'));
    }
    public function store($id)
    {
        $evaluacionColaborador = EvaluacionEncuesta::findOrFail($id);
        //dd($evaluacionColaborador->Encuesta->preguntasEncuesta[0]->pregunta->alternativasPregunta[0]->alternativa);
        return view('evaluarEncuesta.evaluarEncuesta',compact('evaluacionColaborador'));
    }
}
