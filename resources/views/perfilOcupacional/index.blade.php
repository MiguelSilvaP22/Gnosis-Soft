
<table style="width:100%;margin-bottom: 10px;">
	<tbody>
		<tr style="text-align:right;">
			<td >	
				<button id="addPerfil" value="{{$idArea}}" class="btn btn btn-info"><i class="fa fa-plus"></i> Agregar Perfil Ocupacional</button>
			</td>
		</tr>
	</tbody>
</table>
<table id="tablaPerfil" class="table">
	<thead>
		<tr>
			<th>Nombre Perfil Ocupacional</th>
			<th>Competencias</th>
			<th style="text-align:center;">Acciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($perfilesOcu as $perfilocu) 
		<tr>
			<td >{{ $perfilocu->nombre_perfilocu}}</td>

			<td >
			@foreach ($perfilocu->competencias as $comp) 
				{{$comp->nombre_comp }}<br/>
			@endforeach
			</td>
			<td style="text-align:right;">
			{{--	<button id="btnPerfil" value="{{ $perfilocu->id_perfilocu}}" class="btn btn btn-info"><i class="fa fa-eye"></i> Ver</button>--}}
				<button id="editPerfil" class="btn btn btn-info" value="{{ $perfilocu->id_perfilocu}}" ><i class="fa fa-edit"></i> Editar</button>
				<button id="deletePerfil" class="btn btn btn-info" value="{{ $perfilocu->id_perfilocu}}"><i class="fa fa-eraser"></i> Eliminar</button>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
