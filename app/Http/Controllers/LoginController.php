<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Session;
use Hash;
use DB;
use App\Quotation;
use App\Actividad;
use App\Usuario;
class LoginController extends Controller
{
    public function index()
    {
        $errorVali = null;
        return view('index.layoutindex', compact('errorVali'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuario =  Usuario::all()->where('run_usuario',$request->run_usuario)->where('estado_usuario',1)->first();
        if($usuario != null)
        {   
            if(Hash::check($request->clave_usuario, $usuario->clave_usuario))
            {
                Session::put('Usuario', $usuario);
            
                if($usuario->id_perfil == 1)
                {
                    return redirect('admin');

                }
                elseif ($usuario->id_perfil == 2)
                {
                    return redirect('evaluarEncuesta');
                }
                elseif ($usuario->id_perfil == 3)
                {
                    return redirect('vistaEmpresa');
                }
                elseif ($usuario->id_perfil == 4)
                {
                    return redirect('facilitador');
                }
            }
            else
            {
                $errorVali = "Contraseña Incorrecta";
                return view('index.layoutindex', compact('errorVali'));
            }    
        }
        else
        {
            $errorVali = "RUN Incorrecto o no registrado";        
            return view('index.layoutindex', compact('errorVali'));
        }
       
        
    }
    public function logout(Request $request)
    {
        Session::forget('Usuario');
        if(!Session::has('Usuario'))
        {
            return redirect('/');
        }
        
    }

    public function dashboardAdmin()
    {
        if(session()->has('Usuario'))
        {
            if(session('Usuario')->id_perfil == 3)
            {
                $actividades = DB::table('empresa')
                ->join('gerencia', 'empresa.id_empresa', '=', 'gerencia.id_empresa')
                ->join('area', 'gerencia.id_gerencia', '=', 'area.id_gerencia')
                ->join('perfilocupacional', 'area.id_area', '=', 'perfilocupacional.id_area')
                ->join('usuario', 'perfilocupacional.id_perfilocu', '=', 'usuario.id_perfilocu')
                ->join('horariocolaborador', 'usuario.id_usuario', '=', 'horariocolaborador.id_usuario')
                ->join('horario', 'horariocolaborador.id_horario', '=', 'horario.id_horario')
                ->join('actividad', 'horario.id_actividad', '=', 'actividad.id_actividad')
                ->join('curso', 'actividad.id_curso', '=', 'curso.id_curso')
                ->where('empresa.id_empresa',session('Usuario')->perfilocupacional->area->gerencia->empresa->id_empresa)
                ->where('horario.estado_horario',1)
                ->where('actividad.estado_actividad',1)
                ->where('horariocolaborador.estado_horacolab',1)
                ->where('curso.estado_curso',1)
                ->where('usuario.estado_usuario',1)
                ->groupBy('actividad.id_actividad')
                ->select(
                'actividad.id_actividad'
                )->get();
            }
            else
            {
                $actividades = DB::table('empresa')
                ->join('gerencia', 'empresa.id_empresa', '=', 'gerencia.id_empresa')
                ->join('area', 'gerencia.id_gerencia', '=', 'area.id_gerencia')
                ->join('perfilocupacional', 'area.id_area', '=', 'perfilocupacional.id_area')
                ->join('usuario', 'perfilocupacional.id_perfilocu', '=', 'usuario.id_perfilocu')
                ->join('horariocolaborador', 'usuario.id_usuario', '=', 'horariocolaborador.id_usuario')
                ->join('horario', 'horariocolaborador.id_horario', '=', 'horario.id_horario')
                ->join('actividad', 'horario.id_actividad', '=', 'actividad.id_actividad')
                ->join('curso', 'actividad.id_curso', '=', 'curso.id_curso')
                ->where('horario.estado_horario',1)
                ->where('actividad.estado_actividad',1)
                ->where('horariocolaborador.estado_horacolab',1)
                ->where('curso.estado_curso',1)
                ->where('usuario.estado_usuario',1)
                ->groupBy('actividad.id_actividad')
                ->select(
                'actividad.id_actividad'
                )->get();
            }
        }
        \Debugbar::info($actividades);
        return view('admin.dashboard', compact('actividades'));
    }
}
