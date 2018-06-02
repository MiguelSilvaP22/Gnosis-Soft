@extends('admin.layout')

@section ('content')

<body> 
  <div class="row">
		<div class="col-xs-12">
			
			<div class="box">
			
				<div class="box-header">
					<h1 class="box-title">Tabla de Usuarios</h1>
				</div>
				<div style="widtn:100%;align:center;">
					
					<div id="btnAgregar" class="btn btn-block btn-success" style="float: right;margin-bottom: 10px;margin-right: 10px;width:200px;">
						<i class="fa fa-plus"></i>	Agregar
					</div>
				</div>
				<div class="box-body">
				@if (count($usuarios)>0)
				<table id="tablaPerfil" class="table">
					<thead>
						<tr>
							<th>Nombre Usuario</th>
							<th>Perfil Usuario</th>
							<th>Empresa Usuario</th>
							<th>Perfil Ocupacional Usuario</th>
							<th>Fecha de Modificación</th>
							<th>Estado</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($usuarios as $usuario) 
						<tr>

							<td style="width:25%;">{{ $usuario->nombre_usuario. $usuario->apellidopat_usuario.$usuario->apellidomat_usuario}}</td>
							<td style="width:25%;">{{ $usuario->perfil->nombre_perfil}}</td>
							@if($usuario->perfilOcupacional != null)
								<td style="width:25%;">{{ $usuario->perfilOcupacional->area->gerencia->empresa->nombre_empresa}}</td>
								<td style="width:25%;">{{ $usuario->perfilOcupacional->nombre_perfilocu}}</td>
							@else
								<td style="width:25%;"></td>
								<td style="width:25%;"></td>
							@endif
							<td style="width:25%;">{{ $usuario->fecha_mod_usuario}}</td>
							@if($usuario->estado_usuario == 1)
							<td style="width:25%;color:green;">Activo</td>
							@else
							<td style="width:25%;color:red">inactivo</td>
							@endif
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
	$('#tablaEmpresa').DataTable({
			
		});
} );

$(document).on('click', '#btnVer', function () {
		$.ajax({
		url: "/verEmpresa/"+this.value,
		type: "GET",
		success: function (datos) {
			$("#datos").html(datos);
			$('#modal').modal('show');
		}

		});
		//alert("asda");
});	

$(document).on('click', '#btnAgregar', function () {
		$.ajax({
		url: "/crearUsuario/",
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
		url: "/editarUsuario/"+this.value,
		type: "GET",
		success: function (datos) {
			
			$("#datos").html(datos);
			$('#modal').modal('show');
			
		}

		});
		//alert("asda");
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
		//alert("asda");
});



</script>

@stop