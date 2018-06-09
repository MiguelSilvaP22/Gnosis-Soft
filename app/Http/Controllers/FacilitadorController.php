<?php

namespace App\Http\Controllers;

use App\Actividad;
use App\Curso;
use App\Horario;
use App\HorarioFacilitador;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FacilitadorController extends Controller
{
    public function index()
    {
        $actividades = Actividad::all()->where('estado_actividad',1);
        $horarioFacilitador = HorarioFacilitador::all()->where('estado_horafaci',1)->groupBy('id_actividad');
        
        return view('facilitador.index', compact('actividades'));
    }
}
