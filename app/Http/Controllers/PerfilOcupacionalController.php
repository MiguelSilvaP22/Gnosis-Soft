<?php

namespace App\Http\Controllers;


use App\PerfilOcupacional;
use App\Competencia;
use App\CompetenciaPerfil;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PerfilOcupacionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $idArea = $id;
        $perfilesOcu = PerfilOcupacional::all()->where('id_area',$idArea)->where('estado_perfilocu',1);
        return view('perfilOcupacional.index', compact('perfilesOcu','idArea'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $idArea = $id;
        //$categoriasCompetencias = categoriacompetencia::All()->where('estado_categoriacomp',1)->sortBy('nombre_caterogiacomp')->pluck('nombre_categoriacomp','id_categoriacomp');
        $competencias = Competencia::All()->where('estado_comp',1)->sortBy('nombre_comp')->pluck('nombre_comp','id_comp');
        return view('perfilOcupacional.crearPerfilOcupacional', compact('idArea','competencias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $competencias = $request->id_comp;
        $perfilOcu = new PerfilOcupacional;
        $perfilOcu->id_area = $request->id_area;
        $perfilOcu->nombre_perfilocu = $request->nombre_perfilocu;
        $perfilOcu->estado_perfilocu = 1;
        if($perfilOcu->save())
        {
            foreach($competencias as $competencia)
            {
                $competenciaPerfil = new CompetenciaPerfil;
                $competenciaPerfil->id_comp = $competencia;
                $competenciaPerfil->id_perfilocu = $perfilOcu->id_perfilocu;
                $competenciaPerfil->estado_comperfil = 1;
                $competenciaPerfil->save();
            }
        }
            
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
        $perfilOcu = PerfilOcupacional::findOrFail($id);
        $competencias = Competencia::All()->where('estado_comp',1)->sortBy('nombre_comp')->pluck('nombre_comp','id_comp');

        $competenciasPerfil = CompetenciaPerfil::All()->where('id_perfilocu',$perfilOcu->id_perfilocu)->where('estado_comperfil',1)->pluck('id_comp');
        return view('perfilOcupacional.editarPerfilOcupacional', compact('perfilOcu','competenciasPerfil','competencias'));
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
        
        $competencias = $request->id_comp;     
        $perfilOcu = PerfilOcupacional::findOrFail($id);
        $perfilOcu->nombre_perfilocu = $request->nombre_perfilocu;   
         
        if($perfilOcu->save())
        {
            CompetenciaPerfil::where('id_perfilocu',$perfilOcu->id_perfilocu)->update( ['estado_comperfil' => 0]);
            foreach($competencias as $competencia)
            {
                $compPerfil = CompetenciaPerfil::All()->where('id_perfilocu',$perfilOcu->id_perfilocu)->where('id_comp',$competencia)->first();          
                if($compPerfil != null)
                {
                    $compPerfil->estado_comperfil = 1;
                    $compPerfil->save();

                }
                else
                {
                    $competenciaPerfil = new CompetenciaPerfil;
                    $competenciaPerfil->id_comp = $competencia;
                    $competenciaPerfil->id_perfilocu = $perfilOcu->id_perfilocu;
                    $competenciaPerfil->estado_comperfil = 1;

                    $competenciaPerfil->save();
                }
            }
        }

        
        
    //\Debugbar::info($perfilOcu);
      //return redirect()->back();

        

    }
    public function confirmDestroy($id)
    {
        $perfilOcu = PerfilOcupacional::findOrFail($id);
        return view('perfilOcupacional.desactivarPerfilOcupacional', compact('perfilOcu'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        

        $perfilOcu = PerfilOcupacional::findOrFail($id);
        $perfilOcu->eliminar();
        /*$perfilOcu->estado_perfilocu = 0;

        $perfilOcu->save();*/
    }
}
