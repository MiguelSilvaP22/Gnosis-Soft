<div style="widtn:100%;align:center;">
	<button id="addPerfil" value="{{$idArea}}" class="btn btn btn-info"><i class="fa fa-plus"></i> Agregar Perfil Ocupacional</button>
</div>
<table id="tablaPerfil" class="table">
	<thead>
		<tr>
			<th>Nombre Perfil Ocupacional</th>
			<th>Fecha de Modificación</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($perfilesOcu as $perfilocu) 
		<tr>
			<td style="width:25%;">{{ $perfilocu->nombre_perfilocu}}</td>
			<td style="width:25%;">{{ $perfilocu->fecha_mod_perfilocu}}</td>
			<td>
			{{--	<button id="btnPerfil" value="{{ $perfilocu->id_perfilocu}}" class="btn btn btn-info"><i class="fa fa-eye"></i> Ver</button>--}}
				<button id="editPerfil" class="btn btn btn-info" value="{{ $perfilocu->id_perfilocu}}" ><i class="fa fa-edit"></i> Editar</button>
				<button id="deletePerfil" class="btn btn btn-info" value="{{ $perfilocu->id_perfilocu}}"><i class="fa fa-eraser"></i> Eliminar</button>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
