<?php

namespace App\Http\Controllers;

use App\Encuesta;
use App\TipoEncuesta;
use App\TipoAlternativa;
use App\Categoria;
use App\Pregunta;
use App\Alternativa;
use App\AlternativaPregunta;
use App\PreguntaEncuesta;

use DB;
use App\Quotation;
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
        $categoriasPreguntas = Categoria::all()->where('estado_categoria',1)->sortBy('nombre_categoria')->pluck('nombre_categoria','id_categoria');
        $tiposAlternativa = TipoAlternativa::all()->where('estado_tipoaltv',1);
        return view('encuesta.crearEncuesta', compact('tiposEncuesta','categoriasPreguntas','tiposAlternativa'));
    }
    public function store(Request $request)
    {   
        $id_categoriaPregunta = $request->id_categoriaPregunta[0];
        $nomPreguntas = $request->nombre_pregunta;
        $alternativas = Alternativa::all()->where('estado_alternativa',1)->where('id_tipoaltv',1);

        $encuesta = new Encuesta();
        $encuesta->id_tipoencuesta = $request->id_tipoEncuesta;
        $encuesta->observacion_enc = $request->observacion_enc;
        $encuesta->estado_encuesta = 1;
        if($encuesta->save())
        {
            foreach($nomPreguntas as $nomPregunta)
            {
                $pregunta = new Pregunta();
                $pregunta->id_categoria = $id_categoriaPregunta;
                $pregunta->nombre_pregunta = $nomPregunta;
                $pregunta->estado_pregunta = 1;
                if($pregunta->save())
                {
                    foreach($alternativas as $alternativa)
                    {
                        $altertnativaPregunta = new AlternativaPregunta();
                        $altertnativaPregunta->id_alternativa = $alternativa->id_alternativa;
                        $altertnativaPregunta->id_pregunta = $pregunta->id_pregunta;
                        $altertnativaPregunta->estado_altvpre = 1;
                        $altertnativaPregunta->save();
                    }
                    $preguntaEncuesta = new PreguntaEncuesta();
                    $preguntaEncuesta->id_encuesta = $encuesta->id_encuesta;
                    $preguntaEncuesta->id_pregunta = $pregunta->id_pregunta;
                    $preguntaEncuesta->estado_preguntaencuesta = 1;
                    $preguntaEncuesta->save();
                }
            }
            return redirect('encuesta'); 
        }

        
    }

    public function edit($id)
    {
        $encuesta = Encuesta::findOrFail($id);     
        $tiposEncuesta = TipoEncuesta::all()->where('estado_tipoencuesta',1)->sortBy('nombre_tipoencuesta')->pluck('nombre_tipoencuesta','id_tipoencuesta');       
        $categoriasPreguntas = Categoria::all()->where('estado_categoria',1)->sortBy('nombre_categoria')->pluck('nombre_categoria','id_categoria');
        $idCategoria = DB::table('encuesta')
        ->join('preguntaencuesta', 'encuesta.id_encuesta', '=', 'preguntaencuesta.id_encuesta')
        ->join('pregunta', 'preguntaencuesta.id_pregunta', '=', 'pregunta.id_pregunta')
        ->join('categoria', 'pregunta.id_categoria', '=', 'categoria.id_categoria')
        ->where('encuesta.id_encuesta',$encuesta->id_encuesta)
        ->where('preguntaencuesta.estado_preguntaencuesta',1)
        ->select('categoria.id_categoria')
        ->first();
        //dd($idCategoria);
        return view('encuesta.editarEncuesta', compact('tiposEncuesta','categoriasPreguntas','encuesta','idCategoria'));
    } /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, $id)
   {
        $encuesta = Encuesta::findOrFail($id);  
        $nomPreguntas = $request->nombre_pregunta;
        $id_categoriaPregunta = $request->id_categoriaPregunta[0];
        $nomPreguntas = $request->nombre_pregunta;
        $alternativas = Alternativa::all()->where('estado_alternativa',1)->where('id_tipoaltv',1);
        $encuesta->id_tipoencuesta = $request->id_tipoEncuesta;
        $encuesta->observacion_enc = $request->observacion_enc;
        $encuesta->estado_encuesta = 1;
        if($encuesta->save())
        {
            
            $preguntaEncuesta = DB::table('pregunta')
            ->join('preguntaencuesta', 'pregunta.id_pregunta', '=', 'preguntaencuesta.id_pregunta')
            ->join('encuesta', 'preguntaencuesta.id_encuesta', '=', 'encuesta.id_encuesta')
            ->where('encuesta.id_encuesta',$encuesta->id_encuesta)
            ->select('pregunta.*')->update( ['estado_pregunta' => 0]); 
            
            PreguntaEncuesta::where('id_encuesta',$encuesta->id_encuesta)->update( ['estado_preguntaencuesta' => 0]);
            foreach($nomPreguntas as $nomPregunta)
            {    
                $preguntaEncuesta = DB::table('pregunta')
                ->join('preguntaencuesta', 'pregunta.id_pregunta', '=', 'preguntaencuesta.id_pregunta')
                ->join('encuesta', 'preguntaencuesta.id_encuesta', '=', 'encuesta.id_encuesta')
                ->where('encuesta.id_encuesta',$encuesta->id_encuesta)
                ->where('pregunta.nombre_pregunta',$nomPregunta)
                ->select('pregunta.*'); 
                //dd($pregunta);
               
                if($preguntaEncuesta->first() != null)
                {
                    $preguntaEncuesta->update( ['id_categoria' => $id_categoriaPregunta,'estado_pregunta' => 1]); 
                    PreguntaEncuesta::where('id_encuesta',$encuesta->id_encuesta)->where('id_pregunta',$preguntaEncuesta->first()->id_pregunta)->update( ['estado_preguntaencuesta' => 1]);
                }
                else
                {
                    $pregunta = new Pregunta();
                    $pregunta->id_categoria = $id_categoriaPregunta;
                    $pregunta->nombre_pregunta = $nomPregunta;
                    $pregunta->estado_pregunta = 1;
                    if($pregunta->save())
                    {
                        foreach($alternativas as $alternativa)
                        {
                            $altertnativaPregunta = new AlternativaPregunta();
                            $altertnativaPregunta->id_alternativa = $alternativa->id_alternativa;
                            $altertnativaPregunta->id_pregunta = $pregunta->id_pregunta;
                            $altertnativaPregunta->estado_altvpre = 1;
                            $altertnativaPregunta->save();
                        }
                        $preguntaEncuesta = new PreguntaEncuesta();
                        $preguntaEncuesta->id_encuesta = $encuesta->id_encuesta;
                        $preguntaEncuesta->id_pregunta = $pregunta->id_pregunta;
                        $preguntaEncuesta->estado_preguntaencuesta = 1;
                        $preguntaEncuesta->save();
                    }
                }
            }
            return redirect('encuesta'); 
        }
        
        
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

    public function storeCategoriaPreguntas($nombreCategoriaPreguntas,$id)
    {   
        $categoriaPreguntas = new Categoria();
        $categoriaPreguntas->nombre_categoria = $nombreCategoriaPreguntas;
        $categoriaPreguntas->estado_categoria = 1;
        if($categoriaPreguntas->save())
        {
            $categoriasPreguntas = Categoria::all()->where('estado_categoria',1)->sortBy('nombre_categoria')->pluck('nombre_categoria','id_categoria');
            return view('encuesta.selectCategoriaPreguntas', compact('categoriasPreguntas','id'));
        }
    }
    public function formPreguntas($id)
    {
        $idForm = $id;
        $tiposAlternativa = TipoAlternativa::all()->where('estado_tipoaltv',1);
        return view('encuesta.formPreguntas', compact('idForm','tiposAlternativa'));

    }
    public function formCategoriaPreguntas($id)
    {
        $categoriasPreguntas = Categoria::all()->where('estado_categoria',1)->sortBy('nombre_categoria')->pluck('nombre_categoria','id_categoria');
        return view('encuesta.formCategoriaPreguntas',compact('categoriasPreguntas','id'));

    }

}
