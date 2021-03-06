
@extends('admin.layout')
@section ('content')
<body> 

  <div class="row">
		<div class="col-xs-12">
			
			<div class="box">
			
				<div class="box-header">
					<h1 class="box-title">Tabla de Perfiles</h1>
				</div>
				<div style="width:100%;align:center;">
					
					<div id="btnAgregar" class="btn btn-block btn-success" style="float: right;margin-bottom: 10px;margin-right: 10px;width:200px;">
						<i class="fa fa-plus"></i>	Agregar
					</div>
					<div id="btnVerTrash" class="btn btn-block btn-success" style="float: right;margin-top: 0px;margin-bottom: 10px;margin-right: 10px;width:200px;">
						<i class="fa fa-trash"></i>	Ver Eliminados
					</div>
				</div>
				<div class="box-body">
				
				<table id="tablaPerfil" class="table">
					<thead>
						<tr>
							<th>Nombre Perfil</th>
							<th>Fecha de Modificación</th>
							<th>Estado</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($perfiles as $perfil) 
						<tr>
							<td style="width:25%;">{{ $perfil->nombre_perfil}}</td>
							<td style="width:25%;">{{ $perfil->fecha_mod_perfil}}</td>
							@if($perfil->estado_perfil == 1)
							<td style="width:25%;color:green;">Activo</td>
							@else
							<td style="width:25%;color:red">inactivo</td>
							@endif
							<td>
								<button id="btnVer" value="{{ $perfil->id_perfil}}" class="btn btn btn-info"><i class="fa fa-eye"></i> Ver</button>

								<a class="btn btn btn-info" href="{{ route('perfil.edit', ['id'=>$perfil->id_perfil] ) }}"><i class="fa fa-edit"></i> Editar</a>

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
<script>
$(document).on('click', '#btnVer', function () {
		$.ajax({
		url: "/verPerfil/"+this.value,
		type: "GET",
		success: function (datos) {
			$("#datosPerfil").html(datos);
			$('#modal').modal('show');
		}

		});
});	

$("#btnAgregar").click(function(){
	location.href = '/crearPerfil';
	});
$("#btnVerTrash").click(function(){
	location.href = '/perfil/0';
	});	
$(document).ready(function() {

    $('#tablaPerfil').DataTable({
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