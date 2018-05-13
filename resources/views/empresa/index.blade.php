@extends('admin.layout')

@section ('content')

<body> 
  <div class="row">
		<div class="col-xs-12">
			
			<div class="box">
			
				<div class="box-header">
					<h1 class="box-title">Tabla de Empresas</h1>
				</div>
				<div style="widtn:100%;align:center;">
					
					<div id="btnAgregar" class="btn btn-block btn-success" style="float: right;margin-bottom: 10px;margin-right: 10px;width:200px;">
						<i class="fa fa-plus"></i>	Agregar
					</div>
					{{--<div id="btnVerTrash" class="btn btn-block btn-success" style="float: right;margin-top: 0px;margin-bottom: 10px;margin-right: 10px;width:200px;">
						<i class="fa fa-trash"></i>	Ver Eliminados
					</div>--}}
				</div>
				<div class="box-body">
				@if (count($empresas)>0)
				<table id="tablaPerfil" class="table">
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
								<button id="btnVer" value="{{ $empresa->id_empresa}}" class="btn btn btn-info"><i class="fa fa-eye"></i> Ver</button>

								<a class="btn btn btn-info" href="{{ route('empresa.edit', ['id'=>$empresa->id_empresa] ) }}"><i class="fa fa-edit"></i> Editar</a>

								<button class="btn btn btn-info" onclick="eliminarEmpresa({{ $empresa->id_empresa}});"><i class="fa fa-eraser"></i> Eliminar</button>
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
						<div id="datosEmpresa" class="box-body">

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
		url: "/verEmpresa/"+this.value,
		type: "GET",
		success: function (datos) {
			$("#datosEmpresa").html(datos);
			$('#modal').modal('show');
		}

		});
		//alert("asda");
});	

$(document).on('click', '#btnAgregar', function () {
		$.ajax({
		url: "/crearEmpresa/",
		type: "GET",
		success: function (datos) {
			$("#datosEmpresa").html(datos);
			$('#modal').modal('show');
			$(document).ready(function() {
				$('.select2').select2();
				$("#id_region").prop("selectedIndex", -1);
			});
			$(document).on('change', '#id_region', function () {
		
		$.ajax({
		url: "/verComuna/"+this.value,
		type: "GET",
		success: function (datos) {
			$("#comuna").html(datos);
		}
		});
		//alert("asda");
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
				//alert("asda");
		});	

		}

		});
		//alert("asda");
});	
/*$("#btnAgregar").click(function(){
	location.href = '{{route("empresa.crear")}}';
	});*/
$("#btnVerTrash").click(function(){
	location.href = '/empresa/0';
	});	
$(document).ready(function() {

    $('#tablaEmpresa').DataTable({
			
		});
} );
function eliminarEmpresa (id)
{
	var eliminar = confirm("¿Esta seguro de eliminar el perfil?");
	if(eliminar)
	{
		location.href = '/eliminarEmpresa/'+id;
	}
}


</script>

@stop
