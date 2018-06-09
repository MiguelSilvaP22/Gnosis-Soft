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
							<th>Fecha de inicio</th>
							<th>Fecha de termino</th>
							<th>Horarios</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($actividades as $actividad) 
						<tr>
							<td style="width:25%;">{{ $actividad->cod_interno_actividad}}</td>
							<td style="width:25%;">{{ date('d/m/Y',strtotime($actividad->fecha_inicio_actividad))}}</td>
							<td style="width:25%;">{{ date('d/m/Y',strtotime($actividad->fecha_termino_actividad))}}</td>
							<td style="width:25%;">
							@foreach ($actividad->horarios as $horario) 
								{{ $horario->fecha_horario}} <br/>
								@foreach ($horario->horariosFacilitador as $horarioFacilitador) 
									{{ $horarioFacilitador->usuario->nombre_usuario}}<br/>
								@endforeach	
							@endforeach
						</td>		
							<td>
								<button id="btnVer" value="{{ $actividad->id_actividad}}" class="btn btn btn-info"><i class="fa fa-eye"></i> Ver</button>
							</td>
						</tr>
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
	$('#tablaActividad').DataTable({
			
		});
	$("#modal").on("hidden.bs.modal", function(){
   		$("#datos").html("");
	});

} );
$(document).on('click', '#btnVer', function () {
		$.ajax({
		url: "/verActividad/"+this.value,
		type: "GET",
		success: function (datos) {
			$("#datos").html(datos);
			$('#modal').modal('show');
		}

		});
		//alert("asda");
});	
</script>

@stop
