<?php

namespace App\Http\Controllers;

use App\Curso;
use App\Modalidad;
use App\AreaCurso;
use App\Competencia;
use App\CompetenciaCurso;
use App\ContenidoGeneral;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = Curso::all()->where('estado_curso',1);
        return view('curso.index', compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $modalidades = Modalidad::all()->where('estado_modalidad',1)->sortBy('nombre_modalidad')->pluck('nombre_modalidad','id_modalidad');
        $areasCurso = AreaCurso::all()->where('estado_areacurso',1)->sortBy('nombre_areacurso')->pluck('nombre_areacurso','id_areacurso');
        $competencias = Competencia::all()->where('estado_comp',1)->sortBy('nombre_comp')->pluck('nombre_comp','id_comp');
        return view('curso.crearCurso', compact('modalidades','competencias','areasCurso'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // echo 

       
        $contenidosGenerales = $request->contenidoGeneral;
        $competencias = $request->id_competencia;

        $curso = new Curso;
        $curso->cod_interno_curso = $request->cod_interno_curso;
        $curso->cod_sence_curso = $request->cod_sence_curso;
        $curso->nombre_curso = $request->nombre_curso;
        $curso->objetivo_curso = $request->objetivo_curso;
        $curso->desc_curso = $request->desc_curso;
        $curso->cant_hora_curso = $request->cant_hora_curso;
        $curso->id_areacurso = $request->id_areacurso;
        $curso->id_modalidad = $request->id_modalidad;
        $curso->estado_curso = 1;
        if($curso->save())
        {
            foreach($competencias as $competencia)
            {
                $competenciaCurso = new CompetenciaCurso;
                $competenciaCurso->id_comp = $competencia;
                $competenciaCurso->id_curso = $curso->id_curso;
                $competenciaCurso->estado_compcurso = 1;
                $competenciaCurso->save();

            }
            foreach($contenidosGenerales as $contenido)
            {
                $contenidoGeneral = new ContenidoGeneral;
                $contenidoGeneral->id_curso = $curso->id_curso;
                $contenidoGeneral->nombre_contenidog = $contenido;
                $contenidoGeneral->estado_contenidog = 1;
                $contenidoGeneral->save();
            }

            $dir_subida = public_path()."/temario/";
            $ext = pathinfo($_FILES['temario_curso']['name'], PATHINFO_EXTENSION);
            $nombreTemario = $curso->id_curso."_".$curso->cod_interno_curso.".".$ext;
            $fichero_subido = $dir_subida .$nombreTemario;
            
            if (move_uploaded_file($_FILES['temario_curso']['tmp_name'], $fichero_subido)) {
                $curso->link_temario_curso = $nombreTemario ;
                $curso->save();
            } 
        }
        return redirect('curso');

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
        $curso = Curso::findOrFail($id);
        $modalidades = Modalidad::all()->where('estado_modalidad',1)->sortBy('nombre_modalidad')->pluck('nombre_modalidad','id_modalidad');
        $areasCurso = AreaCurso::all()->where('estado_areacurso',1)->sortBy('nombre_areacurso')->pluck('nombre_areacurso','id_areacurso');
        $competencias = Competencia::all()->where('estado_comp',1)->sortBy('nombre_comp')->pluck('nombre_comp','id_comp');
        
        $competenciasCurso = CompetenciaCurso::all()->where('id_curso',$curso->id_curso)->where('estado_compcurso',1)->pluck('id_comp');
        $contenidosGenerales = ContenidoGeneral::all()->where('id_curso',$curso->id_curso)->where('estado_contenidog',1);
        
        return view('curso.editarCurso', compact('curso','modalidades','areasCurso','contenidosGenerales','competencias','competenciasCurso'));
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
        $curso = Curso::findOrFail($id);
        $curso->id_perfilocu = $request->id_perfilocu;
        $curso->run_curso = $request->run_curso;
        $curso->nombre_curso = $request->nombre_curso; 
        //$curso->fechana_curso = $request->fechana_curso;
        $curso->apellidopat_curso = $request->apellidopat_curso;
        $curso->apellidomat_curso = $request->apellidomat_curso;
        $curso->sexo_curso = $request->sexo_curso;
        $curso->email_curso = $request->email_curso;
        $curso->save();
        return redirect('curso');

    }

     public function confirmDestroy($id)
    {
        $curso = Curso::findOrFail($id);
        return view('curso.desactivarCurso', compact('curso'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $curso = Curso::findOrFail($id);
        $curso->eliminar();
        return redirect('curso');
    }
}
