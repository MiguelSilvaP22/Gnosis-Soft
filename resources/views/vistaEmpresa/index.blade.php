@extends('admin.layout')

@section ('content')

<body> 
  <div class="row">
		<div class="col-xs-12">
			
			<div class="box">
			
				<div class="box-header">
					<h1 class="box-title">Resumen de Empresa</h1>
				</div>
				<div class="box-body">
				<div class="table-responsive">	
					<table class="table">
						<thead>
							<tr>
								<th>Plan 2018</th>
								<th>Avance</th>
								<th>% Avance</th>
								<th>% Pendiente</th>
							</tr>
						</thead>
						<tbody>

							<tr>
								<td style="width:25%;">N° de Cursos</td>
								<td style="width:25%;">{{ $tablaResumen->cantcursos}}</td>
							</tr>

							<tr>
								<td style="width:25%;">N° de Participantes</td>
								<td style="width:25%;">{{ $tablaResumen->cantusuarios}}</td>
							</tr>

							<tr>
								<td style="width:25%;">Horas de Capacitación</td>
								<td style="width:25%;">{{ $tablaResumen->canthoras}}</td>
							</tr>
							<tr>
								<td style="width:25%;">Ausentimo</td>
								<td style="width:25%;">{{ $tablaResumen->ausentismo}}</td>
							</tr>

							
								
						</tbody>
					</table>
				</div>
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

} );
$(document).on('click', '#btnVer', function () {

	window.location.replace("/vistaColaborador/detalle/"+this.value);

});	

</script>

@stop
