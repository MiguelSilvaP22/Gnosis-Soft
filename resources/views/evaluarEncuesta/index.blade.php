@extends('admin.layout')

@section ('content')

<body> 
  <div class="row">
		<div class="col-xs-12">
			
			<div class="box">
			
				<div class="box-header">
					<h1 class="box-title">Tabla de Encuestas</h1>
				</div>

				<div class="box-body">
				@if (count($encuestasColaborador)>0)
				<div class="table-responsive">	
					<table id="tablaEncuesta" class="table">
						<thead>
							<tr>
								<th>Nombre Encuesta</th>
								<th>Curso</th>
								<th>Actividad</th>							
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($encuestasColaborador as $encuesta) 
							<tr>

								<td style="width:25%;">{{ $encuesta->nombre_encuesta}}</td>
								<td style="width:25%;">{{ $encuesta->nombre_curso}}</td>
								<td style="width:25%;">Código : {{ $encuesta->cod_interno_actividad}}
									{{ date('d/m/Y',strtotime($encuesta->fecha_horario))}}</td>
								<td>
								@if(Count(App\EvaluacionEncuesta::findOrFail($encuesta->id_evencuesta)->alternativasEvaluacion) > 0)
									<button id="btnEvaluar" value="{{ $encuesta->id_evencuesta }}" disabled="true" class="btn btn btn-info"><i class="fa fa-eye"></i> Respondida</button>
								@elseif(date('d/m/Y',strtotime($encuesta->fecha_horario)) < date('d/m/Y'))
									<button id="btnEvaluar" value="{{ $encuesta->id_evencuesta }}"  class="btn btn btn-info"><i class="fa fa-eye"> </i> Responder</button>
								@else	
									<button id="btnEvaluar" disabled="true" class="btn btn btn-info"><i class="fa fa-eye"></i> Responder</button>
								@endif
								</td>
							</tr>
							@endforeach
							
								
						</tbody>
					</table>
				</div>
				@else
				<h1>No Hay Encuestas asociadas al Colaborador</h1>
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
	$('#tablaEncuesta').DataTable({
		"language": {
			"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ registros",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ningún dato disponible en esta tabla",
			"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
			"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
				"sFirst":    "Primero",
				"sLast":     "Último",
				"sNext":     "Siguiente",
				"sPrevious": "Anterior"
			},
			"oAria": {
				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}
		}
		});
} );

$(document).on('click', '#btnEvaluar', function () {
		$.ajax({
		url: "/crearEvaluarEncuesta/"+this.value,
		type: "GET",
		success: function (datos) {
			$("#datos").html(datos);
			$('#modal').modal('show');
		}

		});
});	




</script>

@stop
