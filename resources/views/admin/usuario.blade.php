@extends('admin.layout')

@section ('content')
<body> 
  <div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Tabla de Usuarios</h3>
				</div>
				<div class="box-body">
				<table id="tablaUsuario" class="table" >
					<thead>
						<tr>
							<th>RUN</th>
							<th>Nombre</th>
							<th>Perfil</th>
							<th>Empresa</th>
							<th>Estado</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>18.629.052-6</td>
							<td>Cristopher Baeza</td>
							<td>Administrador</td>
							<td>-</td>
							<td style="color:green;">Activo</td>
							<td>
								<a>Detalle</a>
								<a>Modificar</a>
								<a>Eliminar</a>
							</td>
						</tr>
						<tr>
							<td>18.629.052-6</td>
							<td>Cristopher Baeza</td>
							<td>Administrador</td>
							<td>-</td>
							<td style="color:green;">Activo</td>
							<td>
								<a>Detalle</a>
								<a>Modificar</a>
								<a>Eliminar</a>
							</td>
						</tr>
						<tr>
							<td>18.629.052-6</td>
							<td>Cristopher Baeza</td>
							<td>Administrador</td>
							<td>-</td>
							<td style="color:red;">Inactivo</td>
							<td>
								<a>Detalle</a>
								<a>Modificar</a>
								<a>Eliminar</a>
							</td>
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
$(document).ready(function() {
    $('#tablaUsuario').DataTable({
			
		});
} );
</script>
@stop