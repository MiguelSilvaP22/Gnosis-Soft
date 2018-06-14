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
        /*  
        //Curso vigentes
        select cu.nombre_curso, cu.cant_hora_curso,count(DISTINCT ac.id_actividad)
        from empresa em
        inner join gerencia ge on em.id_empresa = ge.id_empresa
        inner join area ar on ge.id_gerencia = ar.id_gerencia
        inner join perfilocupacional pocu on ar.id_area = pocu.id_area
        inner join usuario usu on pocu.id_perfilocu = usu.id_perfilocu
        inner join horariocolaborador hoc on usu.id_usuario = hoc.id_usuario
        inner join horario ho on hoc.id_horario = ho.id_horario
        inner join actividad ac on ho.id_actividad= ac.id_actividad and ac.fecha_termino_actividad > now()
        inner join curso cu on ac.id_curso = cu.id_curso
        where 
        em.id_empresa = 8 and
        ho.estado_horario =1 and
        ac.estado_actividad = 1 and
        hoc.estado_horacolab = 1 and
        usu.estado_usuario =1
        group by em.id_empresa, cu.id_curso

        //Curso terminados

        select cu.nombre_curso, cu.cant_hora_curso,count(DISTINCT ac.id_actividad)
        from empresa em
        inner join gerencia ge on em.id_empresa = ge.id_empresa
        inner join area ar on ge.id_gerencia = ar.id_gerencia
        inner join perfilocupacional pocu on ar.id_area = pocu.id_area
        inner join usuario usu on pocu.id_perfilocu = usu.id_perfilocu
        inner join horariocolaborador hoc on usu.id_usuario = hoc.id_usuario
        inner join horario ho on hoc.id_horario = ho.id_horario
        inner join actividad ac on ho.id_actividad= ac.id_actividad and ac.fecha_termino_actividad < now()
        inner join curso cu on ac.id_curso = cu.id_curso
        where 
        em.id_empresa = 8 and
        ho.estado_horario =1 and
        ac.estado_actividad = 1 and
        hoc.estado_horacolab = 1 and
        usu.estado_usuario =1
        group by em.id_empresa, cu.id_curso

        $tablaResumen = DB::table('empresa')
        ->join('gerencia', 'empresa.id_empresa', '=', 'gerencia.id_empresa')
        ->join('area', 'gerencia.id_gerencia', '=', 'area.id_gerencia')
        ->join('perfilocupacional', 'area.id_area', '=', 'perfilocupacional.id_area')
        ->join('usuario', 'perfilocupacional.id_perfilocu', '=', 'usuario.id_perfilocu')
        ->join('horariocolaborador', 'usuario.id_usuario', '=', 'horariocolaborador.id_usuario')
        ->join('horario', 'horariocolaborador.id_horario', '=', 'horario.id_horario')
        ->join('actividad', 'horario.id_actividad', '=', 'actividad.id_actividad','and','actividad.fecha_termino_actividad','<','now()')
        ->join('curso', 'actividad.id_curso', '=', 'curso.id_curso')
        ->where('empresa.id_empresa',8)
        ->where('horario.estado_horario',1)
        ->where('actividad.estado_actividad',1)
        ->where('horariocolaborador.estado_horacolab',1)
        ->where('curso.estado_curso',1)
        ->where('usuario.estado_usuario',1)
        ->groupBy('empresa.id_empresa')
        ->groupBy('curso.id_curso')
        ->select(
        'curso.id_curso',
        'curso.cant_hora_curso',
        DB::raw('count(DISTINCT actividad.id_actividad) as actividades'),
        DB::raw('count(horariocolaborador.id_usuario) as numero_participantes') 
        )->get();


        //Total de cursos
        select cu.nombre_curso, cu.cant_hora_curso,count(DISTINCT ac.id_actividad) as actividades, count(hoc.id_usuario) as numero_participantes
        from empresa em
        inner join gerencia ge on em.id_empresa = ge.id_empresa
        inner join area ar on ge.id_gerencia = ar.id_gerencia
        inner join perfilocupacional pocu on ar.id_area = pocu.id_area
        inner join usuario usu on pocu.id_perfilocu = usu.id_perfilocu
        inner join horariocolaborador hoc on usu.id_usuario = hoc.id_usuario
        inner join horario ho on hoc.id_horario = ho.id_horario
        inner join actividad ac on ho.id_actividad= ac.id_actividad
        inner join curso cu on ac.id_curso = cu.id_curso
        where 
        em.id_empresa = 8 and
        ho.estado_horario =1 and
        ac.estado_actividad = 1 and
        hoc.estado_horacolab = 1 and
        usu.estado_usuario =1
        group by em.id_empresa, cu.id_curso

        $tablaResumen = DB::table('empresa')
        ->join('gerencia', 'empresa.id_empresa', '=', 'gerencia.id_empresa')
        ->join('area', 'gerencia.id_gerencia', '=', 'area.id_gerencia')
        ->join('perfilocupacional', 'area.id_area', '=', 'perfilocupacional.id_area')
        ->join('usuario', 'perfilocupacional.id_perfilocu', '=', 'usuario.id_perfilocu')
        ->join('horariocolaborador', 'usuario.id_usuario', '=', 'horariocolaborador.id_usuario')
        ->join('horario', 'horariocolaborador.id_horario', '=', 'horario.id_horario')
        ->join('actividad', 'horario.id_actividad', '=', 'actividad.id_actividad')
        ->join('curso', 'actividad.id_curso', '=', 'curso.id_curso')
        ->where('empresa.id_empresa',8)
        ->where('horario.estado_horario',1)
        ->where('actividad.estado_actividad',1)
        ->where('horariocolaborador.estado_horacolab',1)
        ->where('curso.estado_curso',1)
        ->where('usuario.estado_usuario',1)
        ->groupBy('empresa.id_empresa')
        ->groupBy('curso.id_curso')
        ->select(
        'curso.id_curso',
        'curso.cant_hora_curso',
        DB::raw('count(DISTINCT actividad.id_actividad) as actividades'),
        DB::raw('count(horariocolaborador.id_usuario) as numero_participantes') 
        )->get();

        */

       
        $tablaResumenAvance = DB::table('empresa')
        ->join('gerencia', 'empresa.id_empresa', '=', 'gerencia.id_empresa')
        ->join('area', 'gerencia.id_gerencia', '=', 'area.id_gerencia')
        ->join('perfilocupacional', 'area.id_area', '=', 'perfilocupacional.id_area')
        ->join('usuario', 'perfilocupacional.id_perfilocu', '=', 'usuario.id_perfilocu')
        ->join('horariocolaborador', 'usuario.id_usuario', '=', 'horariocolaborador.id_usuario')
        ->join('horario', 'horariocolaborador.id_horario', '=', 'horario.id_horario')
        ->join('actividad', function ($join) {
            $join->on('horario.id_actividad', '=', 'actividad.id_actividad')
                 ->where('actividad.fecha_termino_actividad', '>', 'now()');
        })
        ->join('curso', 'actividad.id_curso', '=', 'curso.id_curso')
        ->where('empresa.id_empresa',8)
        ->where('horario.estado_horario',1)
        ->where('actividad.estado_actividad',1)
        ->where('horariocolaborador.estado_horacolab',1)
        ->where('curso.estado_curso',1)
        ->where('usuario.estado_usuario',1)
        ->groupBy('empresa.id_empresa')
        ->groupBy('curso.id_curso')
        ->select(
        'curso.id_curso',
        'curso.cant_hora_curso',
        DB::raw('count(DISTINCT actividad.id_actividad) as actividades'),
        DB::raw('count(horariocolaborador.id_usuario) as numero_participantes') 
        )->get();

        $tablaResumenFaltante = DB::table('empresa')
        ->join('gerencia', 'empresa.id_empresa', '=', 'gerencia.id_empresa')
        ->join('area', 'gerencia.id_gerencia', '=', 'area.id_gerencia')
        ->join('perfilocupacional', 'area.id_area', '=', 'perfilocupacional.id_area')
        ->join('usuario', 'perfilocupacional.id_perfilocu', '=', 'usuario.id_perfilocu')
        ->join('horariocolaborador', 'usuario.id_usuario', '=', 'horariocolaborador.id_usuario')
        ->join('horario', 'horariocolaborador.id_horario', '=', 'horario.id_horario')
        ->join('actividad', function ($join) {
            $join->on('horario.id_actividad', '=', 'actividad.id_actividad')
                 ->where('actividad.fecha_termino_actividad', '<', 'now()');
        })
        ->join('curso', 'actividad.id_curso', '=', 'curso.id_curso')
        ->where('empresa.id_empresa',8)
        ->where('horario.estado_horario',1)
        ->where('actividad.estado_actividad',1)
        ->where('horariocolaborador.estado_horacolab',1)
        ->where('curso.estado_curso',1)
        ->where('usuario.estado_usuario',1)
        ->groupBy('empresa.id_empresa')
        ->groupBy('curso.id_curso')
        ->select(
        'curso.id_curso',
        'curso.cant_hora_curso',
        DB::raw('count(DISTINCT actividad.id_actividad) as actividades'),
        DB::raw('count(horariocolaborador.id_usuario) as numero_participantes') 
        )->get();

        $tablaResumen = DB::table('empresa')
        ->join('gerencia', 'empresa.id_empresa', '=', 'gerencia.id_empresa')
        ->join('area', 'gerencia.id_gerencia', '=', 'area.id_gerencia')
        ->join('perfilocupacional', 'area.id_area', '=', 'perfilocupacional.id_area')
        ->join('usuario', 'perfilocupacional.id_perfilocu', '=', 'usuario.id_perfilocu')
        ->join('horariocolaborador', 'usuario.id_usuario', '=', 'horariocolaborador.id_usuario')
        ->join('horario', 'horariocolaborador.id_horario', '=', 'horario.id_horario')
        ->join('actividad', 'horario.id_actividad', '=', 'actividad.id_actividad')
        ->join('curso', 'actividad.id_curso', '=', 'curso.id_curso')
        ->where('empresa.id_empresa',8)
        ->where('horario.estado_horario',1)
        ->where('actividad.estado_actividad',1)
        ->where('horariocolaborador.estado_horacolab',1)
        ->where('curso.estado_curso',1)
        ->where('usuario.estado_usuario',1)
        ->groupBy('empresa.id_empresa')
        ->groupBy('curso.id_curso')
        ->select(
        'curso.id_curso',
        'curso.cant_hora_curso',
        DB::raw('count(DISTINCT actividad.id_actividad) as actividades'),
        DB::raw('count(horariocolaborador.id_usuario) as numero_participantes') 
        )->get();
       

        dd($tablaResumenFaltante );
        
        return view('vistaEmpresa.index', compact('tablaResumen','tablaResumenAvance','tablaResumenFaltante'));
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
