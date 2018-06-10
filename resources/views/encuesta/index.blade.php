@extends('admin.layout')

@section ('content')

<body> 
  <div class="row">
		<div class="col-xs-12">
			
			<div class="box">
			
				<div class="box-header">
					<h1 class="box-title">Tabla de Encuestas</h1>
				</div>
				<div style="widtn:100%;align:center;">
					
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
							<th>Fecha de Modificación</th>
							<th>Estado</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($encuestas as $encuesta) 
						<tr>
							<td style="width:25%;">{{ $encuesta->nombre_encuesta}}</td>
							<td style="width:25%;">{{ $encuesta->fecha_mod_encuesta}}</td>
							@if($encuesta->estado_encuesta == 1)
							<td style="width:25%;color:green;">Activo</td>
							@else
							<td style="width:25%;color:red">inactivo</td>
							@endif
							<td>
								<button id="btnVer" value="{{ $encuesta->id_encuesta}}" class="btn btn btn-info"><i class="fa fa-eye"></i> Ver</button>

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
