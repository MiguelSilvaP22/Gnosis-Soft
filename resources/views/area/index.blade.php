
<table style="width:100%;margin-bottom: 10px;">
	<tbody>
		<tr style="text-align:right;">
			<td >	
				<button id="addArea" value="{{$idGerencia}}" class="btn btn btn-info"><i class="fa fa-plus"></i> Agregar area</button>
			</td>
		</tr>
	</tbody>
</table>
<table id="tablaArea" class="table">
	<thead>
		<tr>
			<th>Nombre area</th>
			<th style="text-align:center;">Acciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($areas as $area) 
		<tr>
			<td >{{ $area->nombre_area}}</td>
			<td style="text-align:right;">
				{{--<button id="btnPerfil" value="{{ $area->id_area}}" class="btn btn btn-info"><i class="fa fa-eye"></i> Perfiles Ocupacionales</button>--}}
				<button id="editArea" class="btn btn btn-info" value="{{ $area->id_area}}" ><i class="fa fa-edit"></i> Editar</button>
				<button id="deleteArea" class="btn btn btn-info" value="{{ $area->id_area}}"><i class="fa fa-eraser"></i> Eliminar</button>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
