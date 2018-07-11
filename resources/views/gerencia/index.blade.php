<table style="width:100%;margin-bottom: 10px;">
	<tbody>
		<tr style="text-align:right;">
			<td ><button id="addGerencia" value="{{$idEmpresa}}" class="btn btn-info"><i class="fa fa-plus"></i> Agregar Gerencia</button>
			</td>
		</tr>
	</tbody>
</table>
<table id="tablaGerencia" class="table">
	<thead>
		<tr>
			<th>Nombre gerencia</th>
			<th style="text-align:center;">Acciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($gerencias as $gerencia) 
		<tr>
			<td >{{ $gerencia->nombre_gerencia}}</td>
			<td style="text-align:right;">
				{{--<button id="verAreas" value="{{$idEmpresa}},{{ $gerencia->id_gerencia}}" class="btn btn btn-info"><i class="fa fa-eye"></i> Areas</button>--}}
				<button id="editGerencia" class="btn btn btn-info" value="{{ $gerencia->id_gerencia}}" ><i class="fa fa-edit"></i> Editar</button>
				<button id="deleteGerencia" class="btn btn btn-info" value="{{ $gerencia->id_gerencia}}"><i class="fa fa-eraser"></i> Eliminar</button>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
