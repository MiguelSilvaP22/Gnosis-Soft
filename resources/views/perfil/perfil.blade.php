@extends('admin.layout')

@section ('content')

<body> 
  <div class="row">
		<div class="col-xs-12">
			
			<div class="box">
			
				<div class="box-header">
					<h3 class="box-title">Tabla de Perfiles</h3>
				</div>
				<div style="widtn:100%;align:center;">
					<div id="btnAgregar" class="btn btn-block btn-success" style="float: right;margin-bottom: 10px;margin-right: 10px;width:200px;">
					<i class="fa fa-plus"></i>	Agregar
					</div>
				</div>
				<div class="box-body">
				
				<table id="tablaPerfil" class="table" >
					<thead>
						<tr>
							<th>Nombre Perfil</th>
							<th>Estado</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($perfiles as $perfil) 
						<tr>
							<td style="width:35%;">{{ $perfil->nombre_perfil}}</td>
							@if($perfil->estado_perfil == 1)
							<td style="width:35%;color:green;">Activo</td>
							@else
							<td style="width:35%;color:red">inactivo</td>
							@endif
							<td>
								<button id="btnVer" value="{{ $perfil->id_perfil}}" class="btn btn btn-info"><i class="fa fa-eye"></i> Ver</button>
								<a class="btn btn btn-info" href="/modificarPerfil/{{ $perfil->id_perfil}}"><i class="fa fa-edit"></i> Editar</a>
								<button class="btn btn btn-info" onclick="eliminarPerfil({{ $perfil->id_perfil}});"><i class="fa fa-eraser"></i> Eliminar</button>
							</td>
						</tr>
						@endforeach
						
							
					</tbody>
				</table>
				</div>
			</div>
		</div>
	</div>

</body>
<div class="modal fade" id="modal">
	<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-body">	
			<div class="row">
				<div class="col-xs-12">
					<div class="box box-primary">
						<div id="datosPerfil" class="box-body">

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
<script >
$(document).on('click', '#btnVer', function () {
		$.ajax({
		url: "/verPerfil/"+this.value,
		type: "GET",
		success: function (datos) {
			$("#datosPerfil").html(datos);
			$('#modal').modal('show');
		}

		});
		//alert("asda");
});	
$(document).ready(function() {

    $('#tablaPerfil').DataTable({
			
		});

	$("#btnAgregar").click(function(){
	location.href = '/crearPerfil';
	});

	

} );
function eliminarPerfil (id)
{
	var eliminar = confirm("¿Esta seguro de eliminar el perfil?");
	if(eliminar)
	{
		location.href = '/eliminarPerfil/'+id;
	}
}


</script>
@stop