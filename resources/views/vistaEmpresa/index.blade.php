@extends('admin.layout')

@section ('content')

<body> 
  <div class="row">
		<div class="col-xs-12">
			<div class="box">			
				<div class="box-header">
					<h1 class="box-title">Resumen de Empresa</h1>
				</div>
				<div class="box-body">
					<div class="col-xs-6">
							@if(session()->has('Usuario'))
								@if(session('Usuario')->id_perfil == 1)
								<div class="box">			
									<div class="box-header">
										<h1 class="box-title">Filtro</h1>
									</div>
									<div class="box-body">
										<div class='form-group'>
											{!! Form::label('', 'Empresa:') !!}
												{!! Form::select('id_empresa', $empresas,null  ,['class' => 'select2','placeholder'=>'Seleccione un Curso','id'=>'id_empresa', 'style'=>'width:100%']) !!}
											{!! Form::label('', '',['id' => 'errIdCurso']) !!}
										</div>
									</div>
								</div>
								@endif
							@endif
						<div class="box">		
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
											<th>Plan 2018</th>
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
					<div class="col-xs-6">
						<div class="box">			
							<div class="box-header">
								<h1 class="box-title">Grafico: Cantidad de participantes por curso</h1>
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
</body>

<div class="modal fade bs-example-modal-lg" id="modal">
	<div class="modal-dialog modal-lg">
	<div class="modal-content">
		<div class="modal-body">	
			<div class="row">
				<div class="col-xs-12">
					<div class="box box-primary">
						<div id="datos" class="box-body">

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

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
