
	<div class="box">			
		<div class="box-body">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Lista de Cursos</th>
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
		</div>
	</div>


