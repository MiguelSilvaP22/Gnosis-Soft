@extends('admin.layout')

@section ('content')
<h1>Mantenedor Encuestas</h1>
<ol class="breadcrumb">
	<li><a href="/admin"><i class="fa fa-dashboard"></i>Inicio</a></li>
	<li class="active">Encuestas</li>
</ol> 
<body> 
  <div class="row">
		<div class="col-xs-12">
			
			<div class="box">
			
				<div class="box-header">
					<h1 class="box-title">Tabla de Encuestas</h1>
				</div>
				<div style="width:100%;align:center;">
					
					<div id="btnAgregar" class="btn btn-block btn-success" style="float: right;margin-bottom: 10px;margin-right: 10px;width:200px;">
						<i class="fa fa-plus"></i>	Agregar
					</div>
				</div>
				<div class="box-body">
				@if (count($encuestas)>0)
				<table id="tablaEncuesta" class="table">
					<thead>
						<tr>
							<th>Nombre Encuesta</th>
							<th>Tipo Encuesta</th>
							<th style="text-align:center;">Acciones</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($encuestas as $encuesta) 
						<tr>
							<td >{{ $encuesta->nombre_encuesta}}</td>
							<td >{{ $encuesta->tipoEncuesta->nombre_tipoencuesta}}</td>
							<td style="text-align:right;">
								{{--<button id="btnVer" value="{{ $encuesta->id_encuesta}}" class="btn btn btn-info"><i class="fa fa-eye"></i> Ver</button>--}}

								<button id="btnEditar" value="{{ $encuesta->id_encuesta}}" class="btn btn btn-info"><i class="fa fa-edit"></i> Editar</button>

								<button id="deleteEncuesta" class="btn btn btn-info" value="{{ $encuesta->id_encuesta}}"><i class="fa fa-eraser"></i> Eliminar</button>
							</td>
						</tr>
						@endforeach
						
							
					</tbody>
				</table>
				@else
				<h1>No Hay encuestas registradas</h1>
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
	$("#modal").on("hidden.bs.modal", function(){
   		$("#datos").html("");
	});	
} );


$(document).on('click', '#btnVer', function () {
		$.ajax({
		url: "/verEncuesta/"+this.value,
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

$(document).on('click', '#btnAgregar', function () {
		$.ajax({
		url: "/crearEncuesta/",
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
		url: "/editarEncuesta/"+this.value,
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

$(document).on('click', '#deleteEncuesta', function () {
		
		$.ajax({
		url: "/desactivarEncuesta/"+this.value,
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
