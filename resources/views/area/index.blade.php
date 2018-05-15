<div style="widtn:100%;align:center;">
	<button id="addArea" value="{{$idGerencia}}" class="btn btn btn-info"><i class="fa fa-plus"></i> Agregar area</button>
</div>
<table id="tablaArea" class="table">
	<thead>
		<tr>
			<th>Nombre area</th>
			<th>Fecha de Modificación</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($areas as $area) 
		<tr>
			<td style="width:25%;">{{ $area->nombre_area}}</td>
			<td style="width:25%;">{{ $area->fecha_mod_area}}</td>
			<td>
				<button id="btnPerfil" value="{{ $area->id_area}}" class="btn btn btn-info"><i class="fa fa-eye"></i> Perfiles Ocupacionales</button>
				<button id="editArea" class="btn btn btn-info" value="{{ $area->id_area}}" ><i class="fa fa-edit"></i> Editar</button>
				<button id="deleteArea" class="btn btn btn-info" value="{{ $area->id_area}}"><i class="fa fa-eraser"></i> Eliminar</button>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
