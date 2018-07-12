
@extends('admin.layout')
@section ('content')
<body> 
<h1>Mantenedor Competencias</h1>
<ol class="breadcrumb">
	<li><a href="/admin"><i class="fa fa-dashboard"></i>Inicio</a></li>
	<li class="active">Competencias</li>
</ol> 
  <div class="row">
		<div class="col-xs-12">
			
			<div class="box">
			
				<div class="box-header">
					<h1 class="box-title">Tabla de Competencias</h1>
				</div>
				<div style="width:100%;align:center;">
					
					<div id="btnAgregar" class="btn btn-block btn-success" style="float: right;margin-bottom: 10px;margin-right: 10px;width:200px;">
						<i class="fa fa-plus"></i>	Agregar
					</div>
					{{--<div id="btnVerTrash" class="btn btn-block btn-success" style="float: right;margin-top: 0px;margin-bottom: 10px;margin-right: 10px;width:200px;">
						<i class="fa fa-trash"></i>	Ver Eliminados
					</div>

					<div id="btnExportar" class="btn btn-block btn-success" style="float: right;margin-top: 0px;margin-bottom: 10px;margin-right: 10px;width:200px;">
						<i class="fa fa-trash"></i> Exportar Competencias
					</div>

					<div id="btnImportar" class="btn btn-block btn-success" style="float: right;margin-top: 0px;margin-bottom: 10px;margin-right: 10px;width:200px;">
						<i class="fa fa-trash"></i> Importar Competencias
					</div>--}}

				</div>
				<div class="box-body">
				
				<table id="tablaPerfil" class="table">
					<thead>
						<tr>
							<th>Nombre Competencia</th>
							<th>Categoría</th>
							<th style="text-align:center;">Acciones</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($competencias as $competencia) 
						
						<tr>
							<td>{{ $competencia->nombre_comp}}</td>
							<td >{{ $competencia->categoriacompetencia->nombre_categoriacomp}}</td>
							<td style="text-align:right;">
								{{--<button id="verCompetencia" value="{{ $competencia->id_comp}}" class="btn btn btn-info"><i class="fa fa-eye"></i> Ver</button>--}}

								<button class="btn btn btn-info" id="editCompetencia" value="{{$competencia->id_comp}}"><i class="fa fa-edit"></i> Editar</button>

								<button class="btn btn btn-info" onclick="eliminarCompetencia({{ $competencia->id_comp}});"><i class="fa fa-eraser"></i> Eliminar</button>
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
						<div id="datosCompetencia" class="box-body">

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

$(document).on('click', '#btnAgregar', function () {
		$.ajax({
		url: "/crearCompetencia/",
		type: "GET",
		success: function (datos) {
			$("#datosCompetencia").html(datos);
			$('#modal').modal({
                        backdrop: 'static',
                        keyboard: true, 
                        show: true
                });
			$(document).ready(function() {
				$('.select').select();
				//location.href = '/competencia';
			});
		}

		});

});	

$(document).on('click', '#editCompetencia', function () {
		
		
		$.ajax({
		url: "/editarCompetencia/"+this.value,
		type: "GET",
		success: function (datos) {
			$("#datosCompetencia").html(datos);
			$('#modal').modal({
                        backdrop: 'static',
                        keyboard: true, 
                        show: true
                }); 
		}

		});
});	

$(document).on('click', '#verCompetencia', function () {
		
		
		$.ajax({
		url: "/verCompetencia/"+this.value,
		type: "GET",
		success: function (datos) {
			$("#datosCompetencia").html(datos);
			$('#modal').modal({
                        backdrop: 'static',
                        keyboard: true, 
                        show: true
                }); 
		}

		});
});	


$("#btnVerTrash").click(function(){
	location.href = '/perfil/0';
	});	

$("#btnExportar").click(function(){
	location.href = '/exportarcompetencias';
	});	


$(document).on('click', '#btnImportar', function () {
		
		
		$.ajax({
		url: "/importarcompetencias",
		type: "GET",
		success: function (datos) {
			$("#datosCompetencia").html(datos);
			$('#modal').modal({
                        backdrop: 'static',
                        keyboard: true, 
                        show: true
                }); 
		}

		});
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
function eliminarCompetencia(id)
{
	var eliminar = confirm("¿Esta seguro de eliminar la competencia?");
	if(eliminar)
	{
		location.href = '/eliminarCompetencia/'+id;
	}
}


</script>
@stop