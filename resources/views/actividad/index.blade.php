@extends('admin.layout')

@section ('content')
<h1>Mantenedor Actividades</h1>
<ol class="breadcrumb">
	<li><a href="/admin"><i class="fa fa-dashboard"></i>Inicio</a></li>
	<li class="active">Actividades</li>
</ol> 
<body> 
  <div class="row">
		<div class="col-xs-12">
			
			<div class="box">
			
				<div class="box-header">
					<h1 class="box-title">Tabla de Actividades</h1>
				</div>
				<div style="width:100%;align:center;">
					
					@if($idCurso!= null)
						<button id="btnAgregar" value="{{$idCurso}}" class="btn btn-block btn-success" style="float: right;margin-bottom: 10px;margin-right: 10px;width:200px;">
							<i class="fa fa-plus"></i>	Agregar
						</button>
					@else
						<button id="btnAgregar" value="0" class="btn btn-block btn-success" style="float: right;margin-bottom: 10px;margin-right: 10px;width:200px;">
							<i class="fa fa-plus"></i>	Agregar
						</button>
					@endif
				</div>
				<div class="box-body">
				@if (count($actividades)>0)
				<table id="tablaActividad" class="table">
					<thead>
						<tr>
							<th>Código</th>
							<th>Curso</th>	
							<th>Fecha Inicio y Termino</th>
							<th>Horarios </th>													
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($actividades as $actividad) 
							@if($actividad->curso !=null)
							<tr>
								<td >
									<p>Código: {{ $actividad->cod_interno_actividad}}</p>
									<p>SENCE : {{ $actividad->cod_sence_actividad}}</p>
								</td>
								<td >{{ $actividad->curso->nombre_curso}}</td>
								<td >
									<p>{{ date('d/m/Y',strtotime($actividad->fecha_inicio_actividad))}}  </p>
									<p>{{ date('d/m/Y',strtotime($actividad->fecha_termino_actividad))}}</p>			
								</td>
								<td >
									@foreach ($actividad->horarios->where('estado_horario',1) as $horario) 
										<p>{{ date('d/m/Y',strtotime($horario->fecha_horario))}} <br/> 
										desde {{ date('H:i',strtotime($horario->hora_inicio_horario))}}  hasta {{ date('H:i',strtotime($horario->hora_termino_horario))}}  </p>
									@endforeach
								</td>
								<td>
									<button id="btnHorario" value="{{ $actividad->id_actividad}}" class="btn btn btn-info"><i class="fa fa-eye"></i> Horario</button>
									{{--<button id="btnVer" value="{{ $actividad->id_actividad}}" class="btn btn btn-info"><i class="fa fa-eye"></i> Ver</button>--}}				
									<button id="btnEditar" value="{{ $actividad->id_actividad}}" class="btn btn btn-info"><i class="fa fa-edit"></i> Editar</button>
									<button id="deleteActividad" class="btn btn btn-info" value="{{ $actividad->id_actividad}}"><i class="fa fa-eraser"></i> Eliminar</button>
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

<div class="modal fade bs-example-modal-xs" id="modalBorrar">
		<div class="modal-dialog modal-xs">
		<div class="modal-content">
			<div class="modal-body">	
				<div class="row">
					<div class="col-xs-12">
						<div class="box box-primary">
							<div id="datosModalBorrar" class="box-body">
	
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
	$("#modal").on("hidden.bs.modal", function(){
   		$("#datos").html("");
	});
	$("#modalBorrar").on("hidden.bs.modal", function(){
   		$("#datosModalBorrar").html("");
	});
} );

$(document).on('click', '#btnVer', function () {
		$.ajax({
		url: "/verActividad/"+this.value,
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
});	

function cargarCrearHorario(id)
{
	$.ajax({
		url: "/crearHorario/"+id,
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
}
function asignarEncuesta(id)
{
	$.ajax({
		url: "/asignarEncuesta/"+id,
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
}
$(document).on('click', '#btnHorario', function () {
		cargarCrearHorario(this.value)

});	

$(document).on('click', '#btnAgregar', function () {
		$.ajax({
		url: "/crearActividad/"+this.value,
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
});	


$(document).on('click', '#btnEditar', function () {
		$.ajax({
		url: "/editarActividad/"+this.value,
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
});	


$(document).on('click', '#deleteActividad', function () {
		
		$.ajax({
		url: "/desactivarActividad/"+this.value,
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
});



</script>

@stop
