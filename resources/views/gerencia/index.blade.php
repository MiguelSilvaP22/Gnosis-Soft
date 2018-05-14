<div style="widtn:100%;align:center;">
	<button id="addGerencia" value="{{$idEmpresa}}" class="btn btn btn-info"><i class="fa fa-plus"></i> Agregar Gerencia</button>
</div>
<table id="tablaGerencia" class="table">
	<thead>
		<tr>
			<th>Nombre gerencia</th>
			<th>Fecha de Modificación</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($gerencias as $gerencia) 
		<tr>
			<td style="width:25%;">{{ $gerencia->nombre_gerencia}}</td>
			<td style="width:25%;">{{ $gerencia->fecha_mod_gerencia}}</td>
			<td>
				<button id="btnVer" value="{{ $gerencia->id_gerencia}}" class="btn btn btn-info"><i class="fa fa-eye"></i> Areas</button>
				<a class="btn btn btn-info" href="{{ route('gerencia.edit', ['id'=>$gerencia->id_gerencia] ) }}"><i class="fa fa-edit"></i> Editar</a>
				<button class="btn btn btn-info" onclick="eliminargerencia({{ $gerencia->id_gerencia}});"><i class="fa fa-eraser"></i> Eliminar</button>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
