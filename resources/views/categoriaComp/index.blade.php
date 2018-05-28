
@extends('admin.layout')
@section ('content')
<body> 

  <div class="row">
		<div class="col-xs-12">
			
			<div class="box">
			
				<div class="box-header">
					<h1 class="box-title">Tabla de Categorias de Competencias</h1>
				</div>
				<div style="widtn:100%;align:center;">
					
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
							<th>Nombre de Categoria</th>
							<th>Fecha de Modificación</th>
							<th>Estado</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($categoriaComps as $categoriacomp) 
						
						<tr>
							<td style="width:25%;">{{ $categoriacomp->nombre_categoriacomp}}</td>
							<td style="width:25%;">{{ $categoriacomp->fecha_mod_categoriacomp}}</td>
							@if($categoriacomp->estado_categoriacomp == 1)
							<td style="width:25%;color:green;">Activo</td>
							@else
							<td style="width:25%;color:red">inactivo</td>
							@endif
							<td>
								<button id="verCompetencia" value="{{ $categoriacomp->id_categoriacomp}}" class="btn btn btn-info"><i class="fa fa-eye"></i> Ver</button>
								<button class="btn btn btn-info" id="editCompetencia" value="{{$categoriacomp->id_categoriacomp}}"><i class="fa fa-edit"></i> Editar</button>
								<button class="btn btn btn-info" onclick="eliminarCompetencia({{ $categoriacomp->id_categoriacomp}});"><i class="fa fa-eraser"></i> Eliminar</button>
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
			$('#modal').modal('show');
			$(document).ready(function() {
				$('.select').select();
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
			$('#modal').modal('show');
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
			$('#modal').modal('show');
		}

		});
		//alert("asda");
});	


$("#btnVerTrash").click(function(){
	location.href = '/perfil/0';
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