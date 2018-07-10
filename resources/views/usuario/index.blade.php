@extends('admin.layout')


@section ('content')

<h1>Mantenedor Usuarios</h1>
<ol class="breadcrumb">
	<li><a href="/admin"><i class="fa fa-dashboard"></i>Inicio</a></li>
	<li class="active">Usuarios</li>
</ol> 
<body> 
  <div class="row">
		<div class="col-xs-12">
			
			<div class="box">
			
				<div class="box-header">
					<h1 class="box-title">Tabla de Usuarios</h1>
				</div>
				<div style="width:100%;align:center;">
					
					<div id="btnAgregar" class="btn btn-block btn-success" style="float: right;margin-bottom: 10px;margin-right: 10px;width:200px;">
						<i class="fa fa-plus"></i>	Agregar
					</div>
				</div>
				<div class="box-body">
				@if (count($usuarios)>0)
				<table id="tablaUsuario" class="table">
					<thead>
						<tr>
							<th>RUN Usuario</th>
							<th>Nombre Usuario</th>
							<th>Perfil Usuario</th>
							<th>Empresa Usuario</th>
							<th>Perfil Ocupacional Usuario</th>
							<th>Fecha de Modificación</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($usuarios  as $usuario) 
						<tr>
							<td >{{ $usuario->run_usuario}}</td>
							<td >{{ $usuario->nombre_usuario." ". $usuario->apellidopat_usuario." ". $usuario->apellidomat_usuario}}</td>
							<td >{{ $usuario->perfil->nombre_perfil}}</td>
							@if($usuario->perfilOcupacional != null)
								<td >{{ $usuario->perfilOcupacional->area->gerencia->empresa->nombre_empresa}}</td>
								<td style=>{{ $usuario->perfilOcupacional->nombre_perfilocu}}</td>
							@else
								<td></td>
								<td ></td>
							@endif
							<td >{{ date('d/m/Y',strtotime($usuario->fecha_mod_usuario))}}</td>
							<td>
							<button id="btnVer" value="{{ $usuario->id_usuario}}" class="btn btn btn-info"><i class="fa fa-eye"></i> Ver</button>

							<button id="btnEditar" value="{{ $usuario->id_usuario}}" class="btn btn btn-info"><i class="fa fa-edit"></i> Editar</button>

							<button id="deleteUsuario" class="btn btn btn-info" value="{{ $usuario->id_usuario}}"><i class="fa fa-eraser"></i> Eliminar</button>
							</td>
						</tr>
						@endforeach
						
							
					</tbody>
				</table>
				@else
				<h1>No Hay usuarios registrados</h1>
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
	$('#tablaUsuario').DataTable({
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

$(document).on('click', '#btnVer', function () {
		$.ajax({
		url: "/verEmpresa/"+this.value,
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
		url: "/crearUsuario/",
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
		url: "/editarUsuario/"+this.value,
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


$(document).on('click', '#deleteUsuario', function () {
		
		$.ajax({
		url: "/desactivarUsuario/"+this.value,
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
