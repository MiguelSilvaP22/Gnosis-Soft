@extends('admin.layout')

@section ('content')

<body> 
  <div class="row">
		<div class="col-xs-12">
			
			<div class="box">
			
				<div class="box-header">
					<h1 class="box-title">Tabla de Colaboradores</h1>
				</div>
				<div style="widtn:100%;align:center;">
					
					<div id="btnAgregar" class="btn btn-block btn-success" style="float: right;margin-bottom: 10px;margin-right: 10px;width:200px;">
						<i class="fa fa-plus"></i>	Agregar
					</div>
				</div>
				<div class="box-body">
				@if (count($colaboradores)>0)
				<table id="tablaPerfil" class="table">
					<thead>
						<tr>
							<th>Nombre Colaborador</th>
							<th>Fecha de Modificación</th>
							<th>Estado</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($colaboradores as $colaborador) 
						<tr>
							<td style="width:25%;">{{ $colaborador->nombre_colaborador}}</td>
							<td style="width:25%;">{{ $colaborador->fecha_mod_colaborador}}</td>
							@if($colaborador->estado_colaborador == 1)
							<td style="width:25%;color:green;">Activo</td>
							@else
							<td style="width:25%;color:red">inactivo</td>
							@endif
							<td>
								<a id="btnOrg" href="{{ route('organigrama.index', ['id'=>$colaborador->id_colaborador] ) }}" class="btn btn btn-info"><i class="fa fa-sitemap"></i> Organigrama</a>
								<button id="btnVer" value="{{ $colaborador->id_colaborador}}" class="btn btn btn-info"><i class="fa fa-eye"></i> Ver</button>

								<a class="btn btn btn-info" href="{{ route('colaborador.edit', ['id'=>$colaborador->id_colaborador] ) }}"><i class="fa fa-edit"></i> Editar</a>

								<button class="btn btn btn-info" onclick="eliminarcolaborador({{ $colaborador->id_colaborador}});"><i class="fa fa-eraser"></i> Eliminar</button>
							</td>
						</tr>
						@endforeach
						
							
					</tbody>
				</table>
				@else
				<h1>No Hay colaboradores registradas</h1>
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
						<div id="datoscolaborador" class="box-body">

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
		url: "/vercolaborador/"+this.value,
		type: "GET",
		success: function (datos) {
			$("#datoscolaborador").html(datos);
			$('#modal').modal('show');
		}

		});
		//alert("asda");
});	

$(document).on('click', '#btnAgregar', function () {
		$.ajax({
		url: "/crearcolaborador/",
		type: "GET",
		success: function (datos) {
			$("#datoscolaborador").html(datos);
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
		$(document).on('change', "input[name='tipo_colaborador']", function () {
				
				if(this.value == 1)
				{
					$("#colaboradores").show();
				}else
				{
					$("#id_colaborador").val(null).trigger("change"); //Eliminar las colaboradores de holding luego de cambiar a tipo colaborador.
					$("#colaboradores").hide();
				}
				//alert("asda");
		});	

		}

		});
		//alert("asda");
});	
/*$("#btnAgregar").click(function(){
	location.href = '{{route("colaborador.crear")}}';
	});*/
$("#btnVerTrash").click(function(){
	location.href = '/colaborador/0';
	});	
$(document).ready(function() {

    $('#tablacolaborador').DataTable({
			
		});
} );
function eliminarcolaborador (id)
{
	var eliminar = confirm("¿Esta seguro de eliminar el perfil?");
	if(eliminar)
	{
		location.href = '/eliminarcolaborador/'+id;
	}
}


</script>

@stop
