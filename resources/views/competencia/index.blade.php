
@extends('admin.layout')
@section ('content')
<body> 

  <div class="row">
		<div class="col-xs-12">
			
			<div class="box">
			
				<div class="box-header">
					<h1 class="box-title">Tabla de Competencias</h1>
				</div>
				<div style="widtn:100%;align:center;">
					
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
							<th>Categoria</th>
							<th>Fecha de Modificación</th>
							<th>Estado</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($competencias as $competencia) 
						
						<tr>
							<td style="width:25%;">{{ $competencia->nombre_comp}}</td>
							<td style="width:25%;">{{ $competencia->categoriacompetencia->nombre_categoriacomp}}</td>
							<td style="width:25%;">{{ $competencia->fecha_mod_comp}}</td>
							@if($competencia->estado_comp == 1)
							<td style="width:25%;color:green;">Activo</td>
							@else
							<td style="width:25%;color:red">inactivo</td>
							@endif
							<td>
								<button id="verCompetencia" value="{{ $competencia->id_comp}}" class="btn btn btn-info"><i class="fa fa-eye"></i> Ver</button>

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
		//alert("asda");
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
		//alert("asda");
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
		//alert("asda");
});	





$(document).ready(function() {

    $('#tablaPerfil').DataTable({
			
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