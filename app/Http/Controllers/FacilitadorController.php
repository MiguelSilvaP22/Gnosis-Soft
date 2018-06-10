<?php

namespace App\Http\Controllers;

use App\Actividad;
use App\Curso;
use App\Horario;
use App\HorarioFacilitador;
use App\HorarioColaborador;
use App\EvaluacionColab;
use App\Nota;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class FacilitadorController extends Controller
{
    public function index()
    {
        $actividades = Actividad::all()->where('estado_actividad',1);
        $horarioFacilitador = HorarioFacilitador::all()->where('estado_horafaci',1)->groupBy('id_actividad');
        
        return view('facilitador.index', compact('actividades'));
    }
    public function verHorarioFacilitador($id)
    {
        $colaboradoresHorario = HorarioColaborador::all()->where('estado_horacolab',1)->where('id_horario',$id);   
        return view('facilitador.gestionarColaborador', compact('colaboradoresHorario'));
    }
    public function agregarAsistencia($id)
    {
        $valores = explode(",",$id);
        $colaboradorHorario = HorarioColaborador::findOrFail($valores[0]);
        if($valores[1] == 1)
        {
            $colaboradorHorario->asistencia_horacolab = 1;
            $colaboradorHorario->save();
        }
        else
        {
            $colaboradorHorario->asistencia_horacolab = 0;
            $colaboradorHorario->save();
        }    
        
    }
    public function evaluarColaborador($id)
    {
        $colaboradorHorario = HorarioColaborador::findOrFail($id);  
        return view('facilitador.evaluarColaborador', compact('colaboradorHorario'));  
    }

    public function storeEvaluacionColaborador($valorNota,$observacion,$id)
    {   
        $colaboradorHorario = HorarioColaborador::findOrFail($id);  
        $evaluacionColaborador = new EvaluacionColab();
        $evaluacionColaborador->id_horacolab = $id;
        $evaluacionColaborador->observacion_evcolab = $observacion;
        $evaluacionColaborador->estado_evcolab = 1;
        if($evaluacionColaborador->save())
        {
            $nota = new Nota();
            $nota->id_evcolab = $evaluacionColaborador->id_evcolab;
            $nota->valor_nota = $valorNota;
            $nota->estado_nota = 1;
            $nota->save();
        }
        
    }
}
