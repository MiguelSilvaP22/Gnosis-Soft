<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Session;
use Hash;
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
                    return redirect('vistaColaborador');
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
        $actividades = Actividad::All();
        \Debugbar::info($actividades);
        return view('admin.dashboard', compact('actividades'));
    }
}
