<div class="col-md-8">
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
@else
	No existen cursos para la empresa
@endif
<script>
$(document).ready(function() {
	var ctx = $("#myChart");
	var myRadarChart = new Chart(ctx, {
		type: 'doughnut',
		data: {
		labels: [
			@foreach($tablaResumen as $key => $tableNom)
				@if(Count($tablaResumen) > $key-1)
				
				'{{ str_limit($tableNom->nombre_curso, $limit = 50, $end = '...') }}',
				@else
				'{{ str_limit($tableNom->nombre_curso, $limit = 50, $end = '...') }} '
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
