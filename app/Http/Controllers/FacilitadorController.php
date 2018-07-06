<?php

namespace App\Http\Controllers;

use App\Actividad;
use App\Curso;
use App\Horario;
use App\HorarioFacilitador;
use App\HorarioColaborador;
use App\EvaluacionColab;
use App\Nota;
use DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class FacilitadorController extends Controller
{
    public function index()
    {
        
        
        if(session()->exists('Usuario'))
        {
            
            
            if(session('Usuario')->id_perfil == 1 || session('Usuario')->id_perfil == 4)
            {
                $encuestasColaborador = DB::table('horariofacilitador')
                ->join('usuario', 'horariofacilitador.id_usuario', '=', 'usuario.id_usuario')
                ->join('horario', 'horariofacilitador.id_horario', '=', 'horario.id_horario')
                ->join('actividad', 'horario.id_actividad', '=', 'actividad.id_actividad')
                ->join('curso', 'actividad.id_curso', '=', 'curso.id_curso')
                ->where('horariofacilitador.id_usuario',session('Usuario')->id_usuario)
                ->where('horariofacilitador.estado_horafaci',1)
                ->where('horario.estado_horario',1)
                ->where('actividad.estado_actividad',1)
                ->where('curso.estado_curso',1)
                ->select(
                    'curso.nombre_curso',
                    'actividad.id_actividad',
                    'actividad.cod_interno_actividad',
                    'actividad.fecha_inicio_actividad',
                    'actividad.fecha_termino_actividad',
                    'horario.fecha_horario',
                    'horario.id_horario',
                    'usuario.nombre_usuario'
                )->get()->sortBy('fecha_horario');
                $actividades = Actividad::all()->where('estado_actividad',1);
                
                if(session('Usuario')->id_perfil == 4)
                {
                    return view('facilitador.index', compact('encuestasColaborador','actividades'));
                }
                else
                {   
                    return view('facilitador.index', compact('encuestasColaborador','actividades'));
                }
                
            }
            else
            {
                $errorVali = "Usted no esta autorizado a ingresar a este modulo";
                return view('index.layoutindex', compact('errorVali'));
            }
            
        }
        else
        {
            $errorVali = "Usted no a ingresado al sistema";
            return view('index.layoutindex', compact('errorVali'));
        }
        
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
