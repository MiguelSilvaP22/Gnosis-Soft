<?php

namespace App\Http\Controllers;

use App\Comuna;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ComunaController extends Controller
{
    public function comunas($id)
    {
        $comunas = Comuna::All()->where('id_region',$id)->pluck('nombre_comuna','id_comuna');
        return view('comuna.verComuna',compact('comunas'));
    }
}
