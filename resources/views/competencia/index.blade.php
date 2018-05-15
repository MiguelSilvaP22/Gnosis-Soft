
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
					<div id="btnVerTrash" class="btn btn-block btn-success" style="float: right;margin-top: 0px;margin-bottom: 10px;margin-right: 10px;width:200px;">
						<i class="fa fa-trash"></i>	Ver Eliminados
					</div>
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
								<button id="btnVer" value="{{ $competencia->id_comp}}" class="btn btn btn-info"><i class="fa fa-eye"></i> Ver</button>

								<a class="btn btn btn-info" href="{{ route('competencia.edit', ['id'=>$competencia->id_comp] ) }}"><i class="fa fa-edit"></i> Editar</a>

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
			$('#modal').modal('show');
			$(document).ready(function() {
				$('.select').select();
			});
		$(document).on('change', "input[name='tipo_empresa']", function () {
				
				if(this.value == 1)
				{
					$("#empresas").show();
				}else
				{
					$("#id_empresa").val(null).trigger("change"); //Eliminar las empresas de holding luego de cambiar a tipo empresa.
					$("#empresas").hide();
				}
		});	

		}

		});

});	




$("#btnVerTrash").click(function(){
	location.href = '/perfil/0';
	});	
$(document).ready(function() {

    $('#tablaPerfil').DataTable({
			
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