<?php

namespace App\Http\Controllers;

use App\Curso;
use App\Modalidad;
use App\AreaCurso;
use App\Competencia;
use App\CompetenciaCurso;
use App\ContenidoGeneral;
use App\Empresa;

use App\CategoriaCompetencia;

use App\RolDesempeno;
use App\NivelCompetencia;
use App\TipoNivel;
use DB;
use App\Quotation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class vistaCursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areaCursos = AreaCurso::All()->where('estado_areacurso',1);
        $competencias = Competencia::All()->where('estado_comp',1);
        $listaCursos =  Curso::all()->where('estado_curso',1)->sortBy('nombre_curso')->pluck('nombre_curso','id_curso');
        $categoriascompetencias = categoriacompetencia::All()->where('estado_categoriacomp',1);
        \Debugbar::info($areaCursos);
        if(session()->exists('Usuario'))
        {
            if(session('Usuario')->id_perfil ==1 || session('Usuario')->id_perfil ==3 )
            {
                return view('vistacurso.index', compact('competencias','areaCursos', 'listaCursos'));
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function vistacursos($idArea)
    {
        $cursos = Curso::All()->where('estado_curso',1)->where('id_areacurso',$idArea);
        \Debugbar::info($cursos);
        return view('vistacurso.cursos', compact('cursos'));
    }

    public function infocurso($idCurso)
    {
        $curso = Curso::findOrFail($idCurso);
        $area = AreaCurso::findOrFail($curso->id_areacurso);
        $modalidad = Modalidad::findOrFail($curso->id_modalidad);

       /* $competencia = Competencia::findOrFail($idCompetencia);
        $roldesempenos = RolDesempeno::All()->where('estado_roldesempeno',1)->where('id_comp', $idCompetencia);
        $niveles = NivelCompetencia::All()->where('estado_nivelcompetencia',1)->where('id_comp', $idCompetencia)->values();
       // $cursos = Curso::All()->where('estado_curso')->where*/
        //$tiponivel = TipoNivel::All()->where('estado_tiponivel',1)->pluck('nombre_tiponivel');;

        //$nivelesnombre = array_merge($niveles, $tiponivel);

        return view('vistacurso.infocurso', compact('curso','area', 'modalidad'));
    }

    public function indexEstadoCurso()
    {
        $empresas = Empresa::where('estado_empresa',1)->get()->pluck('full_name','id_empresa');

        return view('vistaEstadoCurso.index', compact('empresas'));
    }
    public function cursoEmpresa($id)
    {
        $tablaEmpresa = DB::table('empresa')
        ->join('gerencia', 'empresa.id_empresa', '=', 'gerencia.id_empresa')
        ->join('area', 'gerencia.id_gerencia', '=', 'area.id_gerencia')
        ->join('perfilocupacional', 'area.id_area', '=', 'perfilocupacional.id_area')
        ->join('usuario', 'perfilocupacional.id_perfilocu', '=', 'usuario.id_perfilocu')
        ->join('horariocolaborador', 'usuario.id_usuario', '=', 'horariocolaborador.id_usuario')
        ->join('horario', 'horariocolaborador.id_horario', '=', 'horario.id_horario')
        ->join('actividad', 'horario.id_actividad', '=', 'actividad.id_actividad')
        ->join('curso', 'actividad.id_curso', '=', 'curso.id_curso')
        ->where('empresa.id_empresa',$id)
        ->where('horario.estado_horario',1)
        ->where('actividad.estado_actividad',1)
        ->where('horariocolaborador.estado_horacolab',1)
        ->where('curso.estado_curso',1)
        ->where('usuario.estado_usuario',1)
        ->groupBy('empresa.id_empresa')
        ->groupBy('curso.id_curso')
        ->select(
            'curso.id_curso',
            'curso.nombre_curso'
        )->get()->pluck('nombre_curso','id_curso');
        return view('vistaEstadoCurso.cursosEmpresa', compact('tablaEmpresa'));
    }
    public function actividadesCursoEmpresa($id)
    {
        $ids = explode("-",$id);  
        $actividades = DB::table('empresa')
        ->join('gerencia', 'empresa.id_empresa', '=', 'gerencia.id_empresa')
        ->join('area', 'gerencia.id_gerencia', '=', 'area.id_gerencia')
        ->join('perfilocupacional', 'area.id_area', '=', 'perfilocupacional.id_area')
        ->join('usuario', 'perfilocupacional.id_perfilocu', '=', 'usuario.id_perfilocu')
        ->join('horariocolaborador', 'usuario.id_usuario', '=', 'horariocolaborador.id_usuario')
        ->join('horario', 'horariocolaborador.id_horario', '=', 'horario.id_horario')
        ->join('actividad', 'horario.id_actividad', '=', 'actividad.id_actividad')
        ->join('curso', 'actividad.id_curso', '=', 'curso.id_curso')
        ->where('empresa.id_empresa',$ids[0])
        ->where('curso.id_curso',$ids[1])
        ->where('horario.estado_horario',1)
        ->where('actividad.estado_actividad',1)
        ->where('horariocolaborador.estado_horacolab',1)
        ->where('curso.estado_curso',1)
        ->where('usuario.estado_usuario',1)
        ->groupBy('actividad.id_actividad')
        ->select(
            'actividad.id_actividad',
            DB::raw("CONCAT(actividad.cod_interno_actividad,' (', actividad.fecha_inicio_actividad ,')' ) as nombre_actividad") 
        )->get()->pluck('nombre_actividad','id_actividad');
        
        return view('vistaEstadoCurso.actividadesCursosEmpresa', compact('actividades'));
    }

    public function informacionCurso($id)
    {
        $ids = explode("-",$id);  

        $infoCurso = DB::table('empresa')
        ->join('gerencia', 'empresa.id_empresa', '=', 'gerencia.id_empresa')
        ->join('area', 'gerencia.id_gerencia', '=', 'area.id_gerencia')
        ->join('perfilocupacional', 'area.id_area', '=', 'perfilocupacional.id_area')
        ->join('usuario', 'perfilocupacional.id_perfilocu', '=', 'usuario.id_perfilocu')
        ->join('horariocolaborador', 'usuario.id_usuario', '=', 'horariocolaborador.id_usuario')
        ->join('horario', 'horariocolaborador.id_horario', '=', 'horario.id_horario')
        ->join('actividad', 'horario.id_actividad', '=', 'actividad.id_actividad')
        ->join('curso', 'actividad.id_curso', '=', 'curso.id_curso')
        ->where('empresa.id_empresa',$ids[0])
        ->where('actividad.id_actividad',$ids[1])
        ->where('horario.estado_horario',1)
        ->where('actividad.estado_actividad',1)
        ->where('horariocolaborador.estado_horacolab',1)
        ->where('curso.estado_curso',1)
        ->where('usuario.estado_usuario',1)
        ->select(
            DB::raw("DISTINCT usuario.run_usuario") ,
            'usuario.nombre_usuario',
            'usuario.apellidopat_usuario',
            'usuario.apellidomat_usuario',
            'curso.nombre_curso',
            'curso.cod_sence_curso',
            'curso.cod_interno_curso',
            'curso.cod_interno_curso',
            'curso.objetivo_curso',
            'curso.id_curso',    
            'actividad.fecha_inicio_actividad',
            'actividad.fecha_termino_actividad'
        )->get();
        return view('vistaEstadoCurso.infoCurso', compact('infoCurso'));
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
        //
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
