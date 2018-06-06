@extends('admin.layout')

@section ('content')

<body> 
  <div class="row">
		<div class="col-xs-12">
			
			<div class="box">
			
				<div class="box-header">
					<h1 class="box-title">Tabla de Actividades</h1>
				</div>
				<div style="widtn:100%;align:center;">
					
					<div id="btnAgregar" class="btn btn-block btn-success" style="float: right;margin-bottom: 10px;margin-right: 10px;width:200px;">
						<i class="fa fa-plus"></i>	Agregar
					</div>
				</div>
				<div class="box-body">
				@if (count($actividades)>0)
				<table id="tablaActividad" class="table">
					<thead>
						<tr>
							<th>Codigo Actividad</th>
							<th>Codigo Sence Actividad</th>
							<th>Fecha de Modificación</th>
							<th>Estado</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($actividades as $actividad) 
						<tr>

							<td style="width:25%;">{{ $actividad->cod_interno_actividad}}</td>
							<td style="width:25%;">{{ $actividad->cod_sence_actividad}}</td>
							<td style="width:25%;">{{ $actividad->fecha_mod_actividad}}</td>
							@if($actividad->estado_actividad == 1)
							<td style="width:25%;color:green;">Activo</td>
							@else
							<td style="width:25%;color:red">inactivo</td>
							@endif
							<td>
							<button id="btnVer" value="{{ $actividad->id_actividad}}" class="btn btn btn-info"><i class="fa fa-eye"></i> Ver</button>
							<button id="btnHorario" value="{{ $actividad->id_actividad}}" class="btn btn btn-info"><i class="fa fa-eye"></i> Horario</button>
							<button id="btnEditar" value="{{ $actividad->id_actividad}}" class="btn btn btn-info"><i class="fa fa-edit"></i> Editar</button>

							<button id="deleteActividad" class="btn btn btn-info" value="{{ $actividad->id_actividad}}"><i class="fa fa-eraser"></i> Eliminar</button>
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
$(document).on('click', '#btnHorario', function () {
		cargarCrearHorario(this.value)
		//alert("asda");
});	

$(document).on('click', '#btnAgregar', function () {
		$.ajax({
		url: "/crearActividad/",
		type: "GET",
		success: function (datos) {
			$("#datos").html(datos);
			$('#modal').modal('show');
		}

		});
		//alert("asda");
});	


$(document).on('click', '#btnEditar', function () {
		$.ajax({
		url: "/editarActividad/"+this.value,
		type: "GET",
		success: function (datos) {
			
			$("#datos").html(datos);
			$('#modal').modal('show');
			
		}

		});
		//alert("asda");
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
		//alert("asda");
});



</script>

@stop
