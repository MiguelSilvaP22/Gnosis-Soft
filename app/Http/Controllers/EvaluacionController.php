<?php

namespace App\Http\Controllers;

use App\Usuario;
use App\Nacionalidad;
use App\Empresa;
use App\NivelCompetencia;
use App\TipoNivel;
use App\RolDesempeno;
use App\Competencia;

use App\RolEvaluacion;
use App\EvaluacionDNC;

use App\PerfilOcupacional;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EvaluacionController extends Controller
{
    
    public function index()
    {
        if(session()->exists('Usuario'))
        {
            if(session('Usuario')->id_perfil == 1)
            {
                return view('evaluacion.index');
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

    public function create($id)
    {
        //$colaboradores = Usuario::all()->where('id_perfil',2)->where('estado_usuario',1)->sortBy('rut_usuario')->pluck('run_usuario','id_usuario');
        $colaborador = Usuario::findOrFail($id);
        //$colaboradores = Usuario::all()->where('id_perfil',2)->where('estado_usuario',1);
        return view('evaluacion.crearEvaluacion', compact('colaborador'));
        
    }

        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $evaluaciondnc = new EvaluacionDNC;
        $evaluaciondnc->id_usuario = $request->id_usuario;
        $evaluaciondnc->observacion = $request->observacion;
        $evaluaciondnc->estado_evaluacion=1;

        if($evaluaciondnc->save())
        {
            foreach($request->prueba as $idValue)
            {   
                $valores = explode("-",$idValue);
                //$valores[0] id rol de desempeño
                //$valores[1] id nivel de competencia 1.uperlativo 2.Eficiente 3. promedio   
                $rolevaluacion = new RolEvaluacion;
                $rolevaluacion->id_roldesempeno = $valores[0];
                $rolevaluacion->id_evaluacion = $evaluaciondnc->id_evaluacion;
                $rolevaluacion->nivel_rolevaluacion= $valores[1];
                $rolevaluacion->estado_rolevaluacion=1;
                $rolevaluacion->save();
            }

        }
        return redirect('colaborador');

    }
    
    public function infocolaborador($id)
    {
       $colaborador = Usuario::findOrFail($id);
       $perfilOcupacional = PerfilOcupacional::findOrFail($colaborador->id_perfilocu);
       $competencias = Competencia::All()->where('estado_comp',1)->where('id_perfilocu',$colaborador->id_perfilocu);
       $listaCompetencias = $perfilOcupacional->competencias->pluck('nombre_comp','id_comp');
       //$colaboradores = Usuario::all()->where('id_perfil',2)->where('estado_usuario',1);
       $tiponivel = TipoNivel::All()->where('estado_tiponivel',1)->sortByDesc('id_tiponivel');
       //\Debugbar::info($colaborador->perfilOcupacional->competencias->last()->rolDesempenos->last()->rolEvaluaciones->last()->evaluacionDnc);

       \Debugbar::info($tiponivel);

      /* \Debugbar::info($colaborador->evaluacionDNC->where('estado_evaluacion',1)->last()->rolEvaluacion);

*/
        \Debugbar::info($tiponivel);

        return view('evaluacion.infoColaborador', compact('colaborador','perfilOcupacional', 'listaCompetencias', 'tiponivel'));
        
    }

    public function datosEvaluacion($idCompetencia)
    {
        $competencia = Competencia::findOrFail($idCompetencia);
        $roldesempenos = RolDesempeno::All()->where('estado_roldesempeno',1)->where('id_comp', $idCompetencia);
        $niveles = NivelCompetencia::All()->where('estado_nivelcompetencia',1)->where('id_comp', $idCompetencia)->values();
        $tiponivel = TipoNivel::All()->where('estado_tiponivel',1);
        $evaluacionDNC = EvaluacionDNC::All()->where('estado_evaluacion',1);



        $rolevaluacion=[] ;
        foreach($roldesempenos as $key => $roldesem  )
        {
            $rol1 = RolEvaluacion::where('estado_rolevaluacion',1)->where('id_roldesempeno', $roldesem->id_roldesempeno)->first();
            $rolevaluacion[] = $rol1->nivel_rolevaluacion;
        }            
        \Debugbar::info($tiponivel);


        return view('evaluacion.datosEvaluacion', compact('competencia', 'roldesempenos','tiponivel','rolevaluacion'));
        
    }

  

}
