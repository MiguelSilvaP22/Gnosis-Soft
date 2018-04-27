@extends('admin.layout')

@section ('content')

<body> 
  <div class="row">
		<div class="col-xs-12">
			
			<div class="box">
			
				<div class="box-header">
					<h3 class="box-title">Tabla de Perfiles</h3>
				</div>
				<div style="widtn:100%;align:center;">
					<div id="btnAgregar" class="btn btn-block btn-success" style="float: right;margin-bottom: 10px;margin-right: 10px;width:200px;">
						Agregar
					</div>
				</div>
				<div class="box-body">
				
				<table id="tablaPerfil" class="table" >
					<thead>
						<tr>
							<th>Nombre Perfil</th>
							<th>Estado</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Nombre Perfil</td>
							<td>Estado</td>
							<td>Acciones</td>
						</tr>
					</tbody>
				</table>
				</div>
			</div>
		</div>
	</div>

</body>
@stop
@section('script-js')
<script >
$("#btnAgregar").click(function(){
	location.href = '/crearPerfil';
	});
</script>
@stop