@extends('admin.layout')

@section ('content')

<body> 


<div class="row">
    <div class="col-md-4">
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
    </div>

    <div class="col-md-1"></div>

    <div class="col-md-4">
    <h2>Resumen de Competencias: {{ $colaborador->perfilOcupacional->nombre_perfilocu }} </h2>
        <canvas id="myChart" width="50" height="50"></canvas>
    </div>
</div>

<div class="row">
    <div class="col-md-10">
        <h3>Información de cursos</h3>
        <div class="box">
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
                        <td>{{ $colaborador->horariosColaborador->last()->horario->actividad->fecha_inicio_actividad }} </td>
                        <td>{{ $colaborador->horariosColaborador->last()->horario->actividad->fecha_termino_actividad }} </td>
                        <td><a href="../../vistacurso?area={{ $colaborador->horariosColaborador->last()->horario->actividad->curso->id_areacurso }}&curso={{ $colaborador->horariosColaborador->last()->horario->actividad->curso->id_curso }}"> mas información </a></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-10">
        <a href="../reporte/{{$colaborador->id_usuario}}" class="btn btn btn-info"> Exportar Información a pdf</a>
    </div>
</div>


</body>

@stop

@section('script-js')
<script>
var ctx = $("#myChart");

var myRadarChart = new Chart(ctx, {
    type: 'polarArea',
    data: {
    labels: [  {!! $labelCompetencias!!} ],
    datasets: [{
        data: [{!! $labelPromedio!!} ],
        backgroundColor: ["rgb(255, 99, 132)","rgb(75, 192, 192)","rgb(255, 205, 86)","rgb(201, 203, 207)","rgb(54, 162, 235)"]
        }]
},
    options: {
    }
});

/*
var myChart = new Chart(23, {
    type: 'bar',
    data: {
        labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
*/
</script>
@stop
