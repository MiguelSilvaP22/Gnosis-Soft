@extends('admin.layout')

@section ('content')

<body> 

    <h2>Informacion Colaborador</h2>

    <div class="row">
        <div class="col-md-2">
            <h4>Nombre:</h4>
        </div>
        <div class="col-md-2">
            <h4> {{ $colaborador->nombre_usuario }} </h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <h4>Apellidos:</h4>
        </div>
        <div class="col-md-2">
            <h4> {{ $colaborador->apellidopat_usuario }}  {{ $colaborador->apellidomat_usuario }}</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <h4>Empresa:</h4>
        </div>
        <div class="col-md-2">
            <h4> {{     $colaborador->perfilOcupacional->area->gerencia->empresa->nombre_empresa }}</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <h4>Gerencia:</h4>
        </div>
        <div class="col-md-2">
            <h4> {{     $colaborador->perfilOcupacional->area->gerencia->nombre_gerencia }}</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <h4>Area:</h4>
        </div>
        <div class="col-md-2">
            <h4> {{     $colaborador->perfilOcupacional->area->nombre_area }}</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <h4>Perfil Ocupacional:</h4>
        </div>
        <div class="col-md-2">
            <h4> {{     $colaborador->perfilOcupacional->nombre_perfilocu }}</h4>
        </div>
    </div>

<div>
    <div class="row">
        <canvas id="myChart" width="50" height="50"></canvas>
    </div>
</div>
</body>

@stop

@section('script-js')
<script>
var ctx = $("#myChart");

var myRadarChart = new Chart(ctx, {
    type: 'radar',
    data: {
    labels: ['Running', 'Swimming', 'Eating', 'Cycling'],
    datasets: [{
        data: [15, 15, 12, 11],
        backgroundColor: 'blue'
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
