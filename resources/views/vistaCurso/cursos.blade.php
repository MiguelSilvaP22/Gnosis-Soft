<div class="box">

	<table class="table table-hover">
				<thead>
					<tr>
						<th>Categorias de Competencias</th>
					</tr>
				</thead>
				<tbody>
				@foreach ($cursos as $curso)
					<tr>
					<td id='{{ $curso->id_curso }}' class="cursoTd">{{ $curso->nombre_curso  }}</td>	
					</tr>
				@endforeach
				</tbody>
	</table>
</box>


