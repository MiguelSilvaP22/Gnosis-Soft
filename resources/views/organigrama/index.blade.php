@extends('admin.layout')

@section ('content')

<body> 
  <div class="row">
		<div class="col-xs-12">
			
			<div class="box">
			
				<div class="box-header">
					<h1 class="box-title">Organigrama {{$empresa->nombre_empresa}}</h1>
				</div>
				<table class="table">
					<thead>
						<tr>
							<th>Filtro</tr>
						</tr>
					</thead>
					<tbody>
					<tr>
						<td>
							<button  type="button" id="btnGerencia"  value="{{$empresa->id_empresa}}" class="btn btn-block btn-default" >
								<i class="fa fa-search"></i>	Gerencias
							</button>
						</td>
						<td>
							<button type="button" id="btnArea" value="{{$empresa->id_empresa}}" class="btn btn-block btn-default" >
								<i class="fa fa-search"></i>	Areas
							</button>
						</td>
						<td>
							<button type="button" id="btnPerfil"  value="{{$empresa->id_empresa}}" class="btn btn-block btn-default" >
								<i class="fa fa-search"></i>	Perfiles
							</button>
						</td>
					</tr>	
					</tbody>
				</table>

				<table class="table">
					<tbody>
					<tr>
						<td>
							<div id='selectGerencias'>
							</div>
						</td>

					</tr>
					<tr>
						<td>
							<div id='selectAreas'>
							</div>
						</td>
					</tr>	
					</tbody>
				</table>
				
			
				<div class="box-body">
					
				</div>
			</div>
			<div class="box">
			
				<div class="box-header">
					<h1 class="box-title">Tabla Organigrama {{$empresa->nombre_empresa}}</h1>
				</div>
				<div class="box-body" id="datosTabla">
					
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
						<div id="formModal" class="box-body">

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
refrescarGerencia({{$empresa->id_empresa}});
function refrescarGerencia(id)
{
	$.ajax({
		url: "/gerencia/"+id,
		type: "GET",
		success: function (datos) {
			$("#datosTabla").html(datos);

			$('#tablaGerencia').DataTable({
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
		}

		});
}


$(document).on('click', '#btnGerencia', function () {
	
	$("#selectGerencias").html('');	
	$("#selectAreas").html('');	
	refrescarGerencia(this.value);
});	



$(document).on('click', '#addGerencia', function () {
		
		$.ajax({
		url: "/crearGerencia/"+this.value,
		type: "GET",
		success: function (datos) {
			$("#formModal").html(datos);
			$('#modal').modal({
                        backdrop: 'static',
                        keyboard: true, 
                        show: true
                }); 
		}

		});
});	

$(document).on('click', '#editGerencia', function () {
		
		$.ajax({
		url: "/editarGerencia/"+this.value,
		type: "GET",
		success: function (datos) {
			$("#formModal").html(datos);
			$('#modal').modal({
                        backdrop: 'static',
                        keyboard: true, 
                        show: true
                }); 
		}

		});
});	

$(document).on('click', '#deleteGerencia', function () {
		
		$.ajax({
		url: "/desactivarGerencia/"+this.value,
		type: "GET",
		success: function (datos) {
			$("#formModal").html(datos);
			$('#modal').modal({
                        backdrop: 'static',
                        keyboard: true, 
                        show: true
                }); 
		}

		});
});
function refrescarArea(id)
{
	$.ajax({
		url: "/area/"+id,
		type: "GET",
		success: function (datos) {
			$("#datosTabla").html(datos);

			$('#tablaArea').DataTable({
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
		}

		});
}
function selectGerenciaArea(id,area)
{
	$("#datosTabla").html('');
		$.ajax({
		url: "/selectGerencia/"+id,
		type: "GET",
		success: function (datos) {
			$("#selectGerencias").html(datos);
			$('#select_gerencia').select2();	

			if(area == 1)
			{
				$("#llamadoGerencia").val('1');
				
			}else
			{
				$("#llamadoGerencia").val('0');
			}		
		}

		});
}
$(document).on('click', '#btnArea', function () {
	
	$("#selectAreas").html('');	
	selectGerenciaArea(this.value,0);
	
});

$(document).on('change', '#select_gerencia', function () {
	if($("#llamadoGerencia").val() == 0)
	{
		refrescarArea(this.value);
	}else
	{
		
		$.ajax({
		url: "/selectArea/"+this.value,
		type: "GET",
		success: function (datos) {
			$("#selectAreas").html(datos);
			$('#select_area').select2();			
		}

		});
	}
	
});	     

	
$(document).on('click', '#addArea', function () {
		
		$.ajax({
		url: "/crearArea/"+this.value,
		type: "GET",
		success: function (datos) {
			$("#formModal").html(datos);
			$('#modal').modal('show');
		}

		});
});	  

$(document).on('click', '#editArea', function () {
		
		$.ajax({
		url: "/editarArea/"+this.value,
		type: "GET",
		success: function (datos) {
			$("#formModal").html(datos);
			$('#modal').modal('show');
		}

		});
});	

$(document).on('click', '#deleteArea', function () {
		
		$.ajax({
		url: "/desactivarArea/"+this.value,
		type: "GET",
		success: function (datos) {
			$("#formModal").html(datos);
			$('#modal').modal('show');
		}

		});
});	

// Perfil-----------------------------------------------
function refrescarPerfil(id)
{
	$.ajax({
		url: "/perfilOcupacional/"+id,
		type: "GET",
		success: function (datos) {
			$("#datosTabla").html(datos);

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
		}

		});
}



$(document).on('click', '#btnPerfil', function () {
		$("#selectAreas").html('');	
		selectGerenciaArea(this.value,1);
		
		$("#datosTabla").html('');
		

		
	});
$(document).on('change', '#select_area', function () {
	refrescarPerfil(this.value);
});	     

	
$(document).on('click', '#addPerfil', function () {
		
		$.ajax({
		url: "/crearPerfilOcupacional/"+this.value,
		type: "GET",
		success: function (datos) {
			$("#formModal").html(datos);
			$('#modal').modal('show');
			$('#id_comp').select2();	
		}

		});
});	  

$(document).on('click', '#editPerfil', function () {
		
		$.ajax({
		url: "/editarPerfilOcupacional/"+this.value,
		type: "GET",
		success: function (datos) {
			$("#formModal").html(datos);
			$('#modal').modal('show');
		}

		});
});	

$(document).on('click', '#deletePerfil', function () {
		
		$.ajax({
		url: "/desactivarPerfilOcupacional/"+this.value,
		type: "GET",
		success: function (datos) {
			$("#formModal").html(datos);
			$('#modal').modal('show');
		}

		});
});	
</script>

@stop
