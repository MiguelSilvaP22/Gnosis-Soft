@extends('admin.layout')

@section ('content')

<body> 
<div class="row">
    <div class="col-xs-12">
        <div class="box">			
            <div class="box-header">
                <h1 class="box-title">Resumen de Colaborador</h1>
            </div>
            <div class="box-body">
            <div class="row">  
                <div class="col-xs-6">
                    <h2>Información Colaborador</h2>                   
                        
                    <div class="box">
                        <table class="table table-bordered"> 
                            <tr>
                                <td class="active">RUN</td>
                                <td>{{ $colaborador->run_usuario }}</td>
                            </tr>
                            <tr>
                                <td class="active">Nombre</td>
                                <td>{{ $colaborador->nombre_usuario }}</td>
                            </tr>
                            <tr>
                                <td class="active">Apellidos</td>
                                <td>{{ $colaborador->apellidopat_usuario }}  {{ $colaborador->apellidomat_usuario }}</td>
                            </tr>
                            <tr>
                                <td class="active">Empresa</td>
                                <td>{{ $colaborador->perfilOcupacional->area->gerencia->empresa->nombre_empresa }}</td>
                            </tr>
                            <tr>
                                <td class="active">Gerencia</td>
                                <td>{{  $colaborador->perfilOcupacional->area->gerencia->nombre_gerencia }}</td>
                            </tr>
                            <tr>
                                <td class="active">Area</td>
                                <td>{{$colaborador->perfilOcupacional->area->nombre_area }}</td>
                            </tr>
                            <tr>
                                <td class="active">Perfil Ocupacional</td>
                                <td>{{$colaborador->perfilOcupacional->nombre_perfilocu }}</td>
                            </tr>
                        </table>
                    </div>
                    Exportar: <a href="../reporte/{{$colaborador->id_usuario}}" class="btn btn btn-info">  <i class="fa fa-file-pdf-o"> </i></a> 

                </div>
            
                <div class="col-xs-6">
                <h2 style="text-align: center">Resumen de Competencias: {{ $colaborador->perfilOcupacional->nombre_perfilocu }} </h2>
                    <canvas id="myChart" width="40" height="40"></canvas>
                </div>
            </div>

            <div class="row">
                <div class="col-md-10">
                    <h3>Información de cursos</h3>
                    
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Información de Cursos Realizados
                                </a>
                            </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-responsive">        
                                            <tr>
                                                <td>Nombre Curso</td>
                                                <td>Competencias</td>
                                                <td>Fecha de inicio</td>
                                                <td>Fecha de termino</td>
                                                <td>Información</td>
                                            </tr>
                                            <tr>
                                                <td> {{ $colaborador->horariosColaborador->last()->horario->actividad->curso->nombre_curso }} </td>
                                                <td> 
                                                    @foreach($colaborador->horariosColaborador->last()->horario->actividad->curso->listaCompetencias as $comp)
                                                        {{ $comp->nombre_comp }} <br>
                                                    @endforeach 
                                    
                                                </td>
                                                <td>{{ date('d/m/Y',strtotime($colaborador->horariosColaborador->last()->horario->actividad->fecha_inicio_actividad)) }} </td>
                                                <td>{{ date('d/m/Y',strtotime($colaborador->horariosColaborador->last()->horario->actividad->fecha_termino_actividad)) }} </td>
                                                <td><a href="../../vistacurso?area={{ $colaborador->horariosColaborador->last()->horario->actividad->curso->id_areacurso }}&curso={{ $colaborador->horariosColaborador->last()->horario->actividad->curso->id_curso }}"> Mas información </a></td>
                                            </tr>
                                        </table>
                                    </div>
                            </div>
                            </div>
                        </div>
                        @if($sugerenciasCursos != null)
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Sugerencias Para la toma de nuevo Cursos
                                    </a>
                                </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-responsive">

                                                <tr>
                                                    <td>Nombre Curso</td>
                                                    <td>Competencias</td>
                                                    <td>Información</td>
                                                </tr>
                                                @foreach($sugerenciasCursos as $listaCursos)
                                                    @foreach($listaCursos as $curso)
                                                        
                                                        <tr>
                                                            <td>{{$curso->nombre_curso}}</td>
                                                            <td> 
                                                                @foreach($curso->listaCompetencias as $comp)
                                                                    {{ $comp->nombre_comp }} <br>
                                                                @endforeach 
                                                            </td>
                                                            <td><a href="../../vistacurso?area={{ $curso->id_areacurso }}&curso={{ $curso->id_curso }}"> mas información </a></td>

                                                        </tr>

                                                    @endforeach
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                        <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Sugerencias Para la toma de nuevo Cursos
                                    </a>
                                </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        No Existen Sugerencias
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>
</body>

@stop

@section('script-js')
<script>
console.log({!! $labelCompetencias!!});
console.log({!! $labelPromedio!!} );
var ctx = $("#myChart");
var myRadarChart = new Chart(ctx, {
    type: 'polarArea',
    data: {
    labels: [  {!! $labelCompetencias !!} ],
    datasets: [{
        data: [{!! $labelPromedio!!} ],
        backgroundColor: ["rgb(255, 99, 132)","rgb(75, 192, 192)","rgb(255, 205, 86)","rgb(201, 203, 207)","rgb(54, 162, 235)"]
        }]
    }
});

</script>
@stop
