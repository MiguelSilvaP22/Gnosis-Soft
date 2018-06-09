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
						<i class="fa fa-plus"></i>	Descargar Lista Colaboradores
					</div>
				</div>
				<div class="box-body">
				@if (count($colaboradores)>0)
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

							<td style="width:25%;">{{ $colaborador->nombre_usuario. $colaborador->apellidopat_usuario.$colaborador->apellidomat_usuario}}</td>
							<td style="width:25%;">{{ $colaborador->perfilOcupacional->area->gerencia->empresa->nombre_empresa}}</td>
							<td style="width:25%;">{{ $colaborador->perfilOcupacional->nombre_perfilocu}}</td>
							<td>
							<button id="btnVer" value="{{ $colaborador->id_usuario }}" class="btn btn btn-info"><i class="fa fa-eye"></i> Ver</button>
							</td>
						</tr>
						@endforeach
						
							
					</tbody>
				</table>
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
			
		});
} );

$(document).on('click', '#btnVer', function () {

		window.location.replace("/vistaColaborador/detalle/"+this.value);

});	



</script>

@stop
