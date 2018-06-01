<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoriaCompetencia;
use App\Http\Controllers\Controller;

class CategoriaCompetenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('categoriaComp.index', compact('categoriaComps'));    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function exportar(){
        
        
        \Excel::create('Laravel Excel', function($excel){

            $excel->sheet('Excel shhet', function($sheet) {
               
                $categoriaComps = CategoriaCOmpetencia::all()->where('estado_categoriacomp',1);
                $sheet->row(1,['Nombre de Categoria', 'Descripcion de la categoria']);


                foreach ($categoriaComps as $categoriacomp){
                    $row = [];
                    $row[0] = $categoriacomp->nombre_categoriacomp;
                    $row[1] = $categoriacomp->desc_categoriacomp;
                    $sheet->appendRow($row);                    
                }

            });
        })->export('xls');
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
