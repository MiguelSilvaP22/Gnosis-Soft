@extends('admin.layout')

@section ('content')
<h1>Resumen de Empresa</h1>
<body> 
  <div class="row">
		<div class="col-xs-12">
			<div class="box">			
				<div class="box-body">
					<div class="col-xs-12">
							@if(session()->has('Usuario'))
								@if(session('Usuario')->id_perfil == 1)
								<div class="box">			
									<div class="box-header">
										<h1 class="box-title">Filtro</h1>
									</div>
									<div class="box-body">
										<div class='form-group'>
											{!! Form::label('', 'Empresa:') !!}
												{!! Form::select('id_empresa', $empresas,null  ,['class' => 'select2','placeholder'=>'Seleccione una Empresa','id'=>'id_empresa', 'style'=>'width:100%']) !!}
											{!! Form::label('', '',['id' => 'errIdCurso']) !!}
										</div>
										<div class='form-group'>
											{!! Form::label('', 'Plan Anual:') !!}
												{!! Form::select('id_plan', array("2018"=>'2018',"2017"=>"2017","2016"=>"2016","2015"=>"2015"),null  ,['class' => 'select2','placeholder'=>'Seleccione un Plan','id'=>'id_plan', 'style'=>'width:100%']) !!}
											{!! Form::label('', '',['id' => 'errIdPlan']) !!}
										</div>
										<div class='form-group'>
											{!! Form::button("Filtrar Resumen", ['id'=>'btnFiltrar','class' => 'form-control btn btn-success ']) !!}
										</div>
									</div>
								</div>
								@endif
							@endif
					</div>
					<div id="resumenEmpresa" >
					<div class="col-md-8">
						<div class="box"  >		
							<div class="box-header">
								<h1 class="box-title">Tabla de Empresa</h1>
							</div>
							<div class="box-body">
						
							@if(Count($tablaResumen) > 0)
							<div class="table-responsive">	
								<table class="table">
									<thead>
										<tr>
											<th></th>
											<th>Plan </th>
											<th>Avance</th>
											<th>% Avance</th>
											<th>% Pendiente</th>
										</tr>
									</thead>
									<tbody>

										<tr>
											<td >N° de Cursos</td>
											<td >{{ Count($tablaResumen)}}</td>
											<td >{{ $avance->get('numeroTerminados')}}</td>
											<td >{{ $avance->get('porcentajeAvanceCurso')}}%</td>
											<td >{{ (100-$avance->get('porcentajeAvanceCurso'))}}%</td>
										</tr>

										<tr>
											<td >N° de Participantes</td>
											<td >{{ $tablaResumen->sum('numero_participantes')}}</td>
											<td >{{ $tablaResumenTerminadas->sum('numero_participantes')}}</td>
											<td >{{ $avance->get('porcentajeAvanceParticipante')}}%</td>
											<td >{{ (100-$avance->get('porcentajeAvanceParticipante'))}}%</td>
										</tr>

										<tr>
											<td >Horas de Capacitación</td>
											<td >{{ $tablaResumen->sum('cant_hora_curso')}}</td>
											<td >{{ $avance->get('horasTerminados')}}</td>
											<td >{{ $avance->get('porcentajeAvanceHora')}}%</td>
											<td >{{ (100-$avance->get('porcentajeAvanceHora'))}}%</td>
										</tr>					
									</tbody>
								</table>
							</div>
							@else
								No existen cursos para la empresa
							@endif
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="box">			
							<div class="box-header">
								<h1 class="box-title">Gráfico: Cantidad de participantes por curso</h1>
							</div>
							<div class="box-body">
							<canvas id="myChart" width="50" height="50"></canvas>
							</div>
						</div>
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
$(document).ready(function() {

	$(".select2").select2();
	var ctx = $("#myChart");
	var myRadarChart = new Chart(ctx, {
		type: 'doughnut',
		data: {
		labels: [
			@foreach($tablaResumen as $key => $tableNom)
				@if(Count($tablaResumen) > $key-1)
				'{{$tableNom->nombre_curso}} ',
				@else
				'{{$tableNom->nombre_curso}} '
				@endif
			@endforeach
			  
		],
		datasets: [{
			data: [{{$numeroParticipantes}} ],
			backgroundColor: ["rgb(255, 99, 132)","rgb(75, 192, 192)","rgb(255, 205, 86)","rgb(201, 203, 207)","rgb(54, 162, 235)"]
			}]
	},
		options: {
		}
	});

} );

$(document).on('click', '#btnFiltrar', function () {
		var filtrosEmpresa = $("#id_empresa").val()+","+$("#id_plan").val();
		$.ajax({
		url: "/resumenEmpresa/"+filtrosEmpresa,
		type: "GET",
		success: function (datos) {
			$("#resumenEmpresa").html(datos);
		}

		});
});	
</script>

<style>
.buscador{
	margin-bottom: 20px;
}


.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
@stop
