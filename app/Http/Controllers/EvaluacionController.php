<?php

namespace App\Http\Controllers;

use App\Usuario;
use App\Nacionalidad;
use App\Empresa;
use App\NivelCompetencia;
use App\TipoNivel;
use App\RolDesempeno;
use App\Competencia;
use App\PerfilOcupacional;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EvaluacionController extends Controller
{
    
    public function index()
    {
        return view('evaluacion.index');
    }

    public function create()
    {
       $colaboradores = Usuario::all()->where('id_perfil',2)->where('estado_usuario',1)->sortBy('rut_usuario')->pluck('run_usuario','id_usuario');
        
        //$colaboradores = Usuario::all()->where('id_perfil',2)->where('estado_usuario',1);
        \Debugbar::info($colaboradores);
        return view('evaluacion.crearEvaluacion', compact('colaboradores'));
        
    }

        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //dd($request);
        foreach($request->prueba as $idValue)
        {   
            $valores = explode("-",$idValue);
            echo "idVaina ".$valores[0]."</br>";
            echo "valueVaina ".$valores[1]."</br>";
        }
        /*$colaborador = new Usuario;
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
        return redirect('colaborador');*/

    }
    
    public function infocolaborador($id)
    {
       $colaborador = Usuario::findOrFail($id);
       $perfilOcupacional = PerfilOcupacional::findOrFail($colaborador->id_perfilocu);
       $competencias = Competencia::All()->where('estado_comp',1)->where('id_perfilocu',$colaborador->id_perfilocu);
       $listaCompetencias = $perfilOcupacional->competencias->pluck('nombre_comp','id_comp');;
       //$colaboradores = Usuario::all()->where('id_perfil',2)->where('estado_usuario',1);
       \Debugbar::info($listaCompetencias);

        return view('evaluacion.infoColaborador', compact('colaborador','perfilOcupacional', 'listaCompetencias'));
        
    }

    public function datosEvaluacion($idCompetencia)
    {
        $competencia = Competencia::findOrFail($idCompetencia);
        $roldesempenos = RolDesempeno::All()->where('estado_roldesempeno',1)->where('id_comp', $idCompetencia);
        $niveles = NivelCompetencia::All()->where('estado_nivelcompetencia',1)->where('id_comp', $idCompetencia)->values();
        $tiponivel = TipoNivel::All()->where('estado_tiponivel',1);

        \Debugbar::info($tiponivel);

        return view('evaluacion.datosEvaluacion', compact('competencia', 'roldesempenos','tiponivel'));
        
    }

  

}
