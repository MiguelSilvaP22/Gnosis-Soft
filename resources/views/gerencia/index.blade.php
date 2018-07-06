<div style="width:100%;align:center;">
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
				{{--<button id="verAreas" value="{{$idEmpresa}},{{ $gerencia->id_gerencia}}" class="btn btn btn-info"><i class="fa fa-eye"></i> Areas</button>--}}
				<button id="editGerencia" class="btn btn btn-info" value="{{ $gerencia->id_gerencia}}" ><i class="fa fa-edit"></i> Editar</button>
				<button id="deleteGerencia" class="btn btn btn-info" value="{{ $gerencia->id_gerencia}}"><i class="fa fa-eraser"></i> Eliminar</button>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
