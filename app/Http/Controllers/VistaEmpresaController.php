<?php

namespace App\Http\Controllers;


use App\HorarioColaborador;
use PDF;
use DB;
use App\Quotation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class VistaEmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
        select Count(DISTINCT cu.nombre_curso) as cantCursos,Count(usu.nombre_usuario) as cantUsuarios, SUM(cu.cant_hora_curso) as cantHoras, 
        SUM(CASE WHEN hoc.asistencia_horacolab = 0 THEN 1 ELSE 0 END) as ausentismo
        from curso cu
        inner join actividad ac on cu.id_curso = ac.id_curso
        inner join horario ho on ac.id_actividad = ho.id_actividad
        inner join horariocolaborador hoc on ho.id_horario = hoc.id_horario
        inner join usuario usu on hoc.id_usuario = usu.id_usuario
        where 
        ho.estado_horario =1 and
        ac.estado_actividad = 1 and
        hoc.estado_horacolab = 1 and
        usu.estado_usuario =1
        group by cu.id_curso
        */
        /*
            Tabla Prueba datos pór empresa

            select Count(DISTINCT cu.nombre_curso) as cantCursos,Count(usu.nombre_usuario) as cantUsuarios, SUM(cu.cant_hora_curso) as cantHoras, 
            SUM(CASE WHEN hoc.asistencia_horacolab = 0 THEN 1 ELSE 0 END) as ausentismo,
            (SUM(ho.hora_termino_horario)-SUM(ho.hora_inicio_horario)) as cantHorasactividades
            from curso cu
            inner join actividad ac on cu.id_curso = ac.id_curso
            inner join horario ho on ac.id_actividad = ho.id_actividad
            inner join horariocolaborador hoc on ho.id_horario = hoc.id_horario
            inner join usuario usu on hoc.id_usuario = usu.id_usuario
            inner join perfilocupacional pocu on usu.id_perfilocu = pocu.id_perfilocu
            inner join area ar on pocu.id_area = ar.id_area
            inner join gerencia ge on ar.id_gerencia = ge.id_gerencia
            inner join empresa em on ge.id_empresa = em.id_empresa
            where 
            em.id_empresa = 8 and
            ho.estado_horario =1 and
            ac.estado_actividad = 1 and
            hoc.estado_horacolab = 1 and
            usu.estado_usuario =1
            group by em.id_empresa

            $tablaResumen = DB::table('curso')
            ->join('actividad', 'curso.id_curso', '=', 'actividad.id_curso')
            ->join('horario', 'actividad.id_actividad', '=', 'horario.id_actividad')
            ->join('horariocolaborador', 'horario.id_horario', '=', 'horariocolaborador.id_horario')
            ->join('usuario', 'horariocolaborador.id_usuario', '=', 'usuario.id_usuario')
            ->join('perfilocupacional', 'usuario.id_perfilocu', '=', 'perfilocupacional.id_perfilocu')
            ->join('area', 'perfilocupacional.id_area', '=', 'area.id_area')
            ->join('gerencia', 'area.id_gerencia', '=', 'gerencia.id_gerencia')
            ->join('empresa', 'gerencia.id_empresa', '=', 'empresa.id_empresa')
            ->where('empresa.id_empresa',8)
            ->where('horario.estado_horario',1)
            ->where('actividad.estado_actividad',1)
            ->where('horariocolaborador.estado_horacolab',1)
            ->where('usuario.estado_usuario',1)
            ->groupBy('em.id_empresa')
            ->select(DB::raw('Count(DISTINCT curso.nombre_curso) as cantcursos'),DB::raw('Count(usuario.nombre_usuario) as cantusuarios'),
            DB::raw('SUM(curso.cant_hora_curso) as canthoras'),DB::raw('SUM(CASE WHEN horariocolaborador.asistencia_horacolab = 0 THEN 1 ELSE 0 END) as ausentismo', 
            DB::raw((SUM(ho.hora_termino_horario)-SUM(ho.hora_inicio_horario)) as cantHorasactividades)))
            ->first();
        */
        /*
        // Tabla Pruebas con horarios menores al de hoy

        select Count(DISTINCT ho.id_horario), Count(DISTINCT ho.fecha_horario), Count(DISTINCT usu.run_usuario), (SUM(ho.hora_termino_horario)-SUM(ho.hora_inicio_horario)) as cantHorasRestantes
        from curso cu
        inner join actividad ac on cu.id_curso = ac.id_curso
        inner join horario ho on ac.id_actividad = ho.id_actividad
        inner join horariocolaborador hoc on ho.id_horario = hoc.id_horario
        inner join usuario usu on hoc.id_usuario = usu.id_usuario
        inner join perfilocupacional pocu on usu.id_perfilocu = pocu.id_perfilocu
        inner join area ar on pocu.id_area = ar.id_area
        inner join gerencia ge on ar.id_gerencia = ge.id_gerencia
        inner join empresa em on ge.id_empresa = em.id_empresa
        where 
        em.id_empresa = 8 and        
        ho.fecha_horario < NOW() and
        ho.estado_horario =1 and
        ac.estado_actividad = 1 and
        hoc.estado_horacolab = 1 and
        usu.estado_usuario =1
        group by em.id_empresa
        */
       /* $tablaResumen = DB::table('curso')
        ->join('actividad', 'curso.id_curso', '=', 'actividad.id_curso')
        ->join('horario', 'actividad.id_actividad', '=', 'horario.id_actividad')
        ->join('horariocolaborador', 'horario.id_horario', '=', 'horariocolaborador.id_horario')
        ->join('usuario', 'horariocolaborador.id_usuario', '=', 'usuario.id_usuario')
        ->where('horario.estado_horario',1)
        ->where('actividad.estado_actividad',1)
        ->where('horariocolaborador.estado_horacolab',1)
        ->where('usuario.estado_usuario',1)
        ->groupBy('curso.id_curso')
        ->select(DB::raw('Count(DISTINCT curso.nombre_curso) as cantcursos'),DB::raw('Count(usuario.nombre_usuario) as cantusuarios'),DB::raw('SUM(curso.cant_hora_curso) as canthoras'),DB::raw('SUM(CASE WHEN horariocolaborador.asistencia_horacolab = 0 THEN 1 ELSE 0 END) as ausentismo'))
        ->first();*/

        /*
        Horarios por empresa, y horarios finalizados (asistencia) por empresa

        select hoc.id_horario,count(hoc.id_horario) as cantHorarioEmpresa,
        (select Count(hoc1.id_horario) from horariocolaborador hoc1 where hoc1.asistencia_horacolab = 1 and hoc1.id_horario=hoc.id_horario ) as cantHorarioFinalizado
        from horariocolaborador hoc
        inner join usuario usu on hoc.id_usuario = usu.id_usuario
        inner join perfilocupacional pocu on usu.id_perfilocu = pocu.id_perfilocu
        inner join area ar on pocu.id_area = ar.id_area
        inner join gerencia ge on ar.id_gerencia = ge.id_gerencia
        inner join empresa em on ge.id_empresa = em.id_empresa
        where   
        em.id_empresa = 8 and
        hoc.estado_horacolab = 1 and
        usu.estado_usuario =1
        group by hoc.id_horario
        */
        $tablaResumenPlan = DB::table('curso')
        ->join('actividad', 'curso.id_curso', '=', 'actividad.id_curso')
        ->join('horario', 'actividad.id_actividad', '=', 'horario.id_actividad')
        ->join('horariocolaborador', 'horario.id_horario', '=', 'horariocolaborador.id_horario')
        ->join('usuario', 'horariocolaborador.id_usuario', '=', 'usuario.id_usuario')
        ->join('perfilocupacional', 'usuario.id_perfilocu', '=', 'perfilocupacional.id_perfilocu')
        ->join('area', 'perfilocupacional.id_area', '=', 'area.id_area')
        ->join('gerencia', 'area.id_gerencia', '=', 'gerencia.id_gerencia')
        ->join('empresa', 'gerencia.id_empresa', '=', 'empresa.id_empresa')
        ->where('empresa.id_empresa',8)
        ->where('horario.estado_horario',1)
        ->where('actividad.estado_actividad',1)
        ->where('horariocolaborador.estado_horacolab',1)
        ->where('usuario.estado_usuario',1)
        ->groupBy('empresa.id_empresa')
        ->select(
        DB::raw('Count(DISTINCT curso.nombre_curso) as cantcursos'),
        DB::raw('Count(usuario.nombre_usuario) as cantusuarios'),
        DB::raw('SUM(curso.cant_hora_curso) as canthoras'),
        DB::raw('SUM(CASE WHEN horariocolaborador.asistencia_horacolab = 0 THEN 1 ELSE 0 END) as ausentismo'),  
        DB::raw('((SUM(horario.hora_termino_horario)) - (SUM(horario.hora_inicio_horario))) as canthorasactividades')
        )       
        ->first();

        $tablaResumenAvance = DB::table('horariocolaborador')
        ->join('horario', 'horariocolaborador.id_horario', '=', 'horario.id_horario')
        ->join('actividad', 'horario.id_actividad', '=', 'actividad.id_actividad')
        ->join('usuario', 'horariocolaborador.id_usuario', '=', 'usuario.id_usuario')
        ->join('perfilocupacional', 'usuario.id_perfilocu', '=', 'perfilocupacional.id_perfilocu')
        ->join('area', 'perfilocupacional.id_area', '=', 'area.id_area')
        ->join('gerencia', 'area.id_gerencia', '=', 'gerencia.id_gerencia')
        ->join('empresa', 'gerencia.id_empresa', '=', 'empresa.id_empresa')
        ->where('empresa.id_empresa',8)
        ->where('horario.estado_horario',1)
        ->where('actividad.estado_actividad',1)
        ->where('horariocolaborador.estado_horacolab',1)
        ->where('usuario.estado_usuario',1)
        ->groupBy('actividad.id_curso')
        ->select(
        DB::raw('(select Count(hoc1.id_horario)
        from horariocolaborador as hoc1 
        inner join horario as ho1 on hoc1.id_horario = ho1.id_horario
        inner join actividad as ac1 on ho1.id_actividad = ac1.id_actividad
        where ac1.id_curso=actividad.id_curso ) as canthoracurso'),
        DB::raw('(select Count(hoc2.id_horario)
        from horariocolaborador as hoc2 
        inner join horario as ho2 on hoc2.id_horario = ho2.id_horario
        inner join actividad as ac2 on ho2.id_actividad = ac2.id_actividad
        where hoc2.asistencia_horacolab = 1 and ac2.id_curso=actividad.id_curso )as canthorariofinalizado') 
        )->get();

        dd(($tablaResumenAvance->sum('canthoracurso')-$tablaResumenAvance->sum('canthorariofinalizado')));
        
        return view('vistaEmpresa.index', compact('tablaResumen','tablaResumenAvance'));
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
