<?php

namespace App\Http\Controllers;

use App\Encuesta;
use App\TipoEncuesta;
use App\Categoria;
use Illuminate\Http\Request;

class EncuestaController extends Controller
{
    public function index()
    {   
        $encuestas = Encuesta::all()->where('estado_encuesta',1);
        return view('encuesta.index', compact('encuestas'));
    }
    public function create()
    {   
        $tiposEncuesta = TipoEncuesta::all()->where('estado_tipoencuesta',1)->sortBy('nombre_tipoencuesta')->pluck('nombre_tipoencuesta','id_tipoencuesta');
        return view('encuesta.crearEncuesta', compact('tiposEncuesta'));
    }
    public function store(Request $request)
    {   
        dd($request);
    }
    public function storeTipoEncuesta($nombreTipoEncuesta)
    {   
        $tipoEncuesta = new TipoEncuesta();
        $tipoEncuesta->nombre_tipoencuesta = $nombreTipoEncuesta;
        $tipoEncuesta->estado_tipoencuesta = 1;
        if($tipoEncuesta->save())
        {
            $tiposEncuesta = TipoEncuesta::all()->where('estado_tipoencuesta',1)->sortBy('nombre_tipoencuesta')->pluck('nombre_tipoencuesta','id_tipoencuesta');
            return view('encuesta.selectTipoEncuesta', compact('tiposEncuesta'));
        }
    }

    public function selectCategoriaPreguntas($id)
    {   

        $categoriasPreguntas = Categoria::all()->where('estado_categoria',1)->sortBy('nombre_categoria')->pluck('nombre_categoria','id_categoria');
        return view('encuesta.selectCategoriaPreguntas', compact('categoriasPreguntas'));
        
    }

    public function storeCategoriaPreguntas($nombreCategoriaPreguntas)
    {   
        $categoriaPreguntas = new Categoria();
        $categoriaPreguntas->nombre_categoria = $nombreCategoriaPreguntas;
        $categoriaPreguntas->estado_categoria = 1;
        if($categoriaPreguntas->save())
        {
            $categoriasPreguntas = Categoria::all()->where('estado_categoria',1)->sortBy('nombre_categoria')->pluck('nombre_categoria','id_categoria');
            return view('encuesta.selectCategoriaPreguntas', compact('categoriasPreguntas'));
        }
    }
    public function formPreguntas($id)
    {
        $idForm = $id;
        return view('encuesta.formPreguntas', compact('idForm'));

    }

}
