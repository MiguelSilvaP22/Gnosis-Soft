@extends('admin.layout')

@section ('content')

<body> 
  <div class="row">
		<div class="col-10 col-md-10 col-xs-12">
			
			<div class="box">
			
				<div class="box-header">
					<h1 class="box-title">Tabla de Colaboradores</h1>
				</div>

				<div class="box-body">
				@if (count($colaboradoresEmpresa)>0)
				<div class="table-responsive">	
					<table id="tablaPerfil" class="table">
						<thead>
							<tr>
								<th>Nombre Colaborador</th>
								<th>Empresa Colaborador</th>
								<th>Perfil Colaborador</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($colaboradoresEmpresa as $colaborador) 
							<tr>
								<td style="width:25%;">{{ $colaborador->nombre_usuario." ".$colaborador->apellidopat_usuario." ".$colaborador->apellidomat_usuario}}</td>
								<td style="width:25%;">{{ $colaborador->nombre_empresa}}</td>
								<td style="width:25%;">{{ $colaborador->nombre_perfilocu}}</td>
								<td>
								<button id="btnVer" value="{{ $colaborador->id_usuario }}" class="btn btn btn-info"><i class="fa fa-eye"></i> Ver</button>
								</td>
							</tr>
							@endforeach	
						</tbody>
					</table>
				</div>
				@elseif (count($colaboradores)>0)
				<div class="table-responsive">	
					<table id="tablaPerfil" class="table">
						<thead>
							<tr>
								<th>Nombre Colaborador</th>
								<th>Empresa Colaborador</th>
								<th>Perfil Colaborador</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($colaboradores as $colaborador) 
							<tr>
								<td style="width:25%;">{{ $colaborador->nombre_usuario." ". $colaborador->apellidopat_usuario." ".$colaborador->apellidomat_usuario}}</td>
								<td style="width:25%;">{{ $colaborador->perfilOcupacional->area->gerencia->empresa->nombre_empresa}}</td>
								<td style="width:25%;">{{ $colaborador->perfilOcupacional->nombre_perfilocu}}</td>
								<td>
								<button id="btnVer" value="{{ $colaborador->id_usuario }}" class="btn btn btn-info"><i class="fa fa-eye"></i> Ver</button>
								</td>
							</tr>
							@endforeach	
						</tbody>
					</table>
				</div>
				@else
				<h1>No Hay colaboradores registrados</h1>
				@endif
				</div>
			</div>
		</div>
	</div>

</body>
<div class="modal fade bs-example-modal-lg" id="modal">
	<div class="modal-dialog modal-lg">
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

		window.location.replace("/vistaColaborador/detalle/"+this.value);

});	



</script>

@stop
