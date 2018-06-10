@extends('admin.layout')

@section ('content')

<body> 
  <div class="row">
		<div class="col-xs-12">
			
			<div class="box">
			
				<div class="box-header">
					<h1 class="box-title">Tabla de Actividades</h1>
				</div>
				<div class="box-body">
				@if (count($actividades)>0)
				<table id="tablaActividad" class="table">
					<thead>
						<tr>
							<th>Codigo Actividad</th>
							<th>Curso</th>
							<th>Fecha</th>
							<th>Horarios</th>
						</tr>
					</thead>
					<tbody>
					
						@foreach ($actividades as $actividad) 
						@if(Count($actividad->horarios) > 0)
						<tr>
							<td >{{ $actividad->cod_interno_actividad}}</td>	
							<td >{{ $actividad->curso->nombre_curso}}</td>							
							<td >{{ date('d/m/Y',strtotime($actividad->fecha_inicio_actividad))."-".date('d/m/Y',strtotime($actividad->fecha_termino_actividad))}}</td>
							<td >
							@foreach ($actividad->horarios->sortBy('fecha_horario') as $horario) 
							<nav class="navbar navbar-light bg-light">
								<a class="nav-link" href="javascript:verHorarioFacilitador({{$horario->id_horario}})">{{ "Dia: ". date('d/m/Y',strtotime($horario->fecha_horario))}}
							
								@if(Count($horario->horariosFacilitador)>0)
								@foreach ($horario->horariosFacilitador as $horarioFacilitador) 							
									<p>{{ "Facilitador: ".$horarioFacilitador->usuario->nombre_usuario}}</p>
								@endforeach	
								@else
									<p>{{ "Facilitador: Sin Aisgnar"}}</p>
								@endif
								</a>
							</nav>	
							@endforeach
							</td>		
						</tr>
						@endif
						@endforeach
					</tbody>
				</table>
				@else
					<h1>No Hay actividades registrados</h1>
				@endif
				</div>
			</div>
		</div>
	</div>

</body>
<style>
	td {
    width: 10%;
    white-space: nowrap;
}
</style>
<div class="modal fade bs-example-modal-lg" id="modal">
	<div class="modal-dialog modal-lg">
	<div class="modal-content">
		<div class="modal-body">	
			<div class="row">
				<div class="col-lg-12">
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
<div class="modal fade bs-example-modal-xs" id="modalEvaluacion">
	<div class="modal-dialog modal-xs">
	<div class="modal-content">
		<div class="modal-body">	
			<div class="row">
				<div class="col-xs-12">
					<div class="box box-primary">
						<div id="datosEvaluacion" class="box-body">

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
	$('#tablaActividad').DataTable({
			
		});
	$("#modal").on("hidden.bs.modal", function(){
   		$("#datos").html("");
	});

} );
function verHorarioFacilitador(id){
		$.ajax({
		url: "/verHorarioFacilitador/"+id,
		type: "GET",
		success: function (datos) {
			$("#datos").html(datos);
			$('#modal').modal({
				backdrop: 'static',
                keyboard: true, 
                show: true
			});
		}

		});
		//alert("asda");
};	




</script>

@stop
