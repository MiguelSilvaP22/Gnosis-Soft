<?php

namespace App\Http\Controllers;

use App\HorarioFacilitador;
use App\HorarioColaborador;
use App\Horario;
use App\Empresa;
use App\Usuario;

use DB;
use App\Quotation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HorarioController extends Controller
{
    
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $horarioActividad = Horario::findOrFail($id);
        $queryColabEmpresa = DB::table('usuario')
            ->join('perfilocupacional', 'usuario.id_perfilocu', '=', 'perfilocupacional.id_perfilocu')
            ->join('area', 'perfilocupacional.id_area', '=', 'area.id_area')
            ->join('gerencia', 'area.id_gerencia', '=', 'gerencia.id_gerencia')
            ->join('empresa', 'gerencia.id_empresa', '=', 'empresa.id_empresa')
            ->join('horariocolaborador', 'usuario.id_usuario', '=', 'horariocolaborador.id_usuario')
            ->where('horariocolaborador.id_horario',$id)
            ->where('horariocolaborador.estado_horacolab',1)
            ->where('usuario.estado_usuario',1)
            ->select('usuario.id_usuario','empresa.id_empresa')
            ->get();
        $idEmpresa = $queryColabEmpresa[0]->id_empresa;
        $colaboradores = DB::table('usuario')
            ->join('perfilocupacional', 'usuario.id_perfilocu', '=', 'perfilocupacional.id_perfilocu')
            ->join('area', 'perfilocupacional.id_area', '=', 'area.id_area')
            ->join('gerencia', 'area.id_gerencia', '=', 'gerencia.id_gerencia')
            ->join('empresa', 'gerencia.id_empresa', '=', 'empresa.id_empresa')
            ->where('empresa.id_empresa',$idEmpresa)
            ->where('usuario.id_perfil',2)
            ->where('usuario.estado_usuario',1)
            ->select('usuario.*')
            ->get()
            ->sortBy('nombre_usuario')
            ->pluck('run_usuario','id_usuario'); 
        $colaboradoresHorario = $queryColabEmpresa->pluck('id_usuario');
       
    	$facilitadores = Usuario::all()->where('id_perfil',4)->where('estado_usuario',1)->sortBy('nombre_usuario')->pluck('nombre_usuario','id_usuario');
    	$empresas = Empresa::all()->where('estado_empresa',1)->sortBy('nombre_empresa')->pluck('nombre_empresa','id_empresa');
    	$facilitadoresHorario = HorarioFacilitador::all()->where('id_horario',$id)->where('estado_horafaci',1)->pluck('id_usuario');
    	
    	return view('horario.asignarHorario', compact('horarioActividad','facilitadores','colaboradores','empresas','colaboradoresHorario','facilitadoresHorario','idEmpresa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$facilitadores = $request->id_facilitador;
    	$colaboradores = $request->id_colaborador;
        HorarioFacilitador::where('id_horario',$request->id_horario)->update( ['estado_horafaci' => 0]);
    	foreach($facilitadores as $facilitador)
    	{
            $faciHorario = HorarioFacilitador::All()->where('id_horario',$request->id_horario)->where('id_usuario',$facilitador)->first();
            if($faciHorario != null)
            {
                $faciHorario->estado_horafaci = 1;
                $faciHorario->save();

            }
            else
            {
                $faci = new HorarioFacilitador();
                $faci->id_horario = $request->id_horario;
                $faci->id_usuario = $facilitador;
                $faci->estado_horafaci = 1;
                $faci->save();
            }
    		

    	}
        HorarioColaborador::where('id_horario',$request->id_horario)->update( ['estado_horacolab' => 0]);
    	foreach($colaboradores as $colaborador)
    	{
            $colaHorario = HorarioColaborador::All()->where('id_horario',$request->id_horario)->where('id_usuario',$colaborador)->first();
            if($colaHorario != null)
            {
                $colaHorario->estado_horacolab = 1;
                $colaHorario->save();

            }
            else
            {
                $cola = new HorarioColaborador();
                $cola->id_horario = $request->id_horario;
                $cola->id_usuario = $colaborador;
                $cola->estado_horacolab = 1;
                $cola->save();
            }
    		
    	}
    	return redirect('actividad');

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
