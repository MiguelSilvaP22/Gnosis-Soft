<?php

namespace App\Http\Controllers;

use App\Competencia;
use App\CategoriaCompetencia;
use App\RolDesempeno;
use App\NivelCompetencia;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompetenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $competencias = Competencia::all()->where('estado_comp',1);
        return view('competencia.index', compact('competencias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoriascompetencias = categoriacompetencia::All()->where('estado_categoriacomp',1)->sortBy('nombre_caterogiacomp')->pluck('nombre_categoriacomp','id_categoriacomp');
        //dd($categoriascompetencias);
        return view('competencia.crearCompetencia',compact('categoriascompetencias'));
    }


    public function exportar(){
        
        
        \Excel::create('Laravel Excel', function($excel){

            $excel->sheet('Excel shhet', function($sheet) {
               
                $competencias = Competencia::all()->where('estado_comp',1);
             //   $categoriascompetencias = categoriacompetencia::All()->where('estado_categoriacomp',1)->sortBy('nombre_caterogiacomp')->pluck('nombre_categoriacomp','id_categoriacomp');
                $sheet->row(1,['Nombre de Categoria de Competencia', 'Nombre de Competencia', 'Descripcion de Competencia']);
                

              foreach ($competencias as $competencia){
                    $row = [];
                    $categoriascompetencia = categoriacompetencia::where('estado_categoriacomp',1)->where('id_categoriacomp', $competencia->id_categoriacomp)->firstOrFail();
                   \Debugbar::info($categoriascompetencia);
                    $row[0] = $categoriascompetencia->nombre_categoriacomp;
                    $row[1] = $competencia->nombre_comp;
                    $row[2] = $competencia->desc_comp;
                    \Debugbar::info($competencia->dedesc_comp);
                    $sheet->appendRow($row);      
                }
                

            });
        })->export('xls');
    }

    public function importar(){

        //dd($categoriascompetencias);
        return view('competencia.importarCompetencia');
    }




    /**
     * importarguardar a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     
    public function importarguardar(Request $request){
+
        $competencia = new competencia;
        $competencia->nombre_comp = $request->nombre_comp;
        $competencia->desc_comp = $request->desc_comp;
        $competencia->id_categoriacomp = $request->id_categoriacomp;
        $competencia->estado_comp = 1;
    

    }


       /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if($request->tipo==0)
        {
            $competencia = new competencia;
            $competencia->nombre_comp = $request->nombre_comp;
            $competencia->desc_comp = $request->desc_comp;
            $competencia->id_categoriacomp = $request->id_categoriacomp;
            $competencia->estado_comp = 1;

            if($competencia->save())
            {
                        
                foreach($request->RolDesempenos as $roldesem)
                {
                    $roldesempeno = new RolDesempeno;
                    $roldesempeno->id_comp = $competencia->id_comp;
                    $roldesempeno->nombre_roldesempeno = $roldesem;
                    $roldesempeno->estado_roldesempeno = 1;
                    $roldesempeno->save();
                }

                foreach($request->niveles as $key => $nivel)
                {
                    $nivelcompetencia = new NivelCompetencia;
                    $nivelcompetencia->id_comp=$competencia->id_comp;
                    $nivelcompetencia->desc_nivelcompetencia=$nivel;
                    $nivelcompetencia->id_tiponivel = $key+1;
                    $nivelcompetencia->estado_nivelcompetencia = 1;

                    $nivelcompetencia->save();
                }

                return redirect('competencia');
            }
        }

        if($request->tipo==1)
        {
            $file =  $request->file('Archivo'); 
            
            \Excel::load();
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
        $competencia = Competencia::findOrFail($id);
        $categoriascompetencias = categoriacompetencia::All()->where('estado_categoriacomp',1)->sortBy('nombre_caterogiacomp')->pluck('nombre_categoriacomp','id_categoriacomp');
        $roldesempenos = RolDesempeno::All()->where('estado_roldesempeno',1)->where('id_comp', $id);
        $niveles = NivelCompetencia::All()->where('estado_nivelcompetencia',1)->where('id_comp', $id)->pluck('desc_nivelcompetencia');
        \Debugbar::info($niveles);
        return view('Competencia.verCompetencia', compact('competencia','categoriascompetencias', 'roldesempenos', 'niveles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $competencia = Competencia::findOrFail($id);
        $categoriascompetencias = categoriacompetencia::All()->where('estado_categoriacomp',1)->sortBy('nombre_caterogiacomp')->pluck('nombre_categoriacomp','id_categoriacomp');
        $roldesempenos = RolDesempeno::All()->where('estado_roldesempeno',1)->where('id_comp', $id);
        $niveles = NivelCompetencia::All()->where('estado_nivelcompetencia',1)->where('id_comp', $id)->pluck('desc_nivelcompetencia');
        return view('Competencia.editarCompetencia', compact('competencia','categoriascompetencias','roldesempenos','niveles'));
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
        $competencia = Competencia::findOrFail($id);
        $competencia->nombre_comp = $request->nombre_comp;
        $competencia->desc_comp = $request->desc_comp;
        $competencia->id_categoriacomp = $request->id_categoriacomp;

        if($competencia->save())
            {  
                RolDesempeno::where('id_comp',$competencia->id_comp)->update( ['estado_roldesempeno' => 0]);
                foreach($request->RolDesempenos as $roldesem)
                {
                    $rolComp = RolDesempeno::All()->where('id_comp',$competencia->id_comp)->where('nombre_roldesempeno',$roldesem)->first();          
                    if($rolComp != null)
                    {
                        $rolComp->estado_roldesempeno = 1;
                        $rolComp->save();
                    }
                    else
                    {
                        $roldesempeno = new RolDesempeno;
                        $roldesempeno->id_comp = $competencia->id_comp;
                        $roldesempeno->nombre_roldesempeno = $roldesem;
                        $roldesempeno->estado_roldesempeno = 1;
                        $roldesempeno->save();
                    }
                    
                }
                NivelCompetencia::where('id_comp',$competencia->id_comp)->update( ['estado_nivelcompetencia' => 0]);
                foreach($request->niveles as $key => $nivel)
                {
                    $nivelComp = NivelCompetencia::All()->where('id_comp',$competencia->id_comp)->where('id_tiponivel',$key+1)->first();          
                    if($nivelComp != null)
                    {
                        $nivelComp->desc_nivelcompetencia=$nivel;
                        $nivelComp->estado_nivelcompetencia = 1;
                        $nivelComp->save();
                    }
                    else
                    {
                        $nivelcompetencia = new NivelCompetencia;
                        $nivelcompetencia->id_comp=$competencia->id_comp;
                        $nivelcompetencia->desc_nivelcompetencia=$nivel;
                        $nivelcompetencia->id_tiponivel = $key+1;
                        $nivelcompetencia->estado_nivelcompetencia = 1;
                        $nivelcompetencia->save();
                    }
                   
                }
                return redirect('competencia');
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $competencia = Competencia::findOrFail($id);
        $competencia->estado_comp = 0;
        if($competencia->save())
        {
            return Redirect::action('busqueda@index');
        }
    }
}
