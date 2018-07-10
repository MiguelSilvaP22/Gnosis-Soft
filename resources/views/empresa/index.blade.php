@extends('admin.layout')

@section ('content')
<h1>Mantenedor Empresas</h1>
<ol class="breadcrumb">
	<li><a href="/admin"><i class="fa fa-dashboard"></i>Inicio</a></li>
	<li class="active">Empresas</li>
</ol> 
<body> 
  <div class="row">
		<div class="col-xs-12">
			
			<div class="box">
			
				<div class="box-header">
					<h1 class="box-title">Tabla de Empresas </h1>
				</div>
				<div style="width:100%;align:center;">
					
					<div id="btnAgregar" class="btn btn-block btn-success" style="float: right;margin-bottom: 10px;margin-right: 10px;width:200px;">
						<i class="fa fa-plus"></i>	Agregar
					</div>
					{{--<div id="btnVerTrash" class="btn btn-block btn-success" style="float: right;margin-top: 0px;margin-bottom: 10px;margin-right: 10px;width:200px;">
						<i class="fa fa-trash"></i>	Ver Eliminados
					</div>--}}
				</div>
				<div class="box-body">
				@if (count($empresas)>0)
				<table id="tablaEmpresa" class="table">
					<thead>
						<tr>
							<th>Nombre Empresa</th>
							<th>Fecha de Modificación</th>
							<th>Estado</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($empresas as $empresa) 
						<tr>
							<td style="width:25%;">{{ $empresa->nombre_empresa}}</td>
							<td style="width:25%;">{{ $empresa->fecha_mod_empresa}}</td>
							@if($empresa->estado_empresa == 1)
							<td style="width:25%;color:green;">Activo</td>
							@else
							<td style="width:25%;color:red">inactivo</td>
							@endif
							<td>
								<a id="btnOrg" href="{{ route('organigrama.index', ['id'=>$empresa->id_empresa] ) }}" class="btn btn btn-info"><i class="fa fa-sitemap"></i> Organigrama</a>
								<button id="btnVer" value="{{ $empresa->id_empresa}}" class="btn btn btn-info"><i class="fa fa-eye"></i> Ver</button>

								<button id="btnEditar" value="{{ $empresa->id_empresa}}" class="btn btn btn-info"><i class="fa fa-edit"></i> Editar</button>

								<button id="deleteEmpresa" class="btn btn btn-info" value="{{ $empresa->id_empresa}}"><i class="fa fa-eraser"></i> Eliminar</button>
							</td>
						</tr>
						@endforeach
						
							
					</tbody>
				</table>
				@else
				<h1>No Hay empresas registradas</h1>
				@endif
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
		url: "/crearEmpresa/",
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
		url: "/editarEmpresa/"+this.value,
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

$("#btnVerTrash").click(function(){
	location.href = '/empresa/0';
	});	


$(document).on('click', '#deleteEmpresa', function () {
		
		$.ajax({
		url: "/desactivarEmpresa/"+this.value,
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
