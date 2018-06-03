<div class="box">
	<table class="table table-hover">
				<thead>
					<tr>
						<th>Categorias de Competencias</th>
					</tr>
				</thead>
				<tbody>
				@foreach ($competencias as $competencia)
					<tr>
					<td>{{ $competencia->nombre_comp }}</td>	
					</tr>
				@endforeach
				</tbody>
	</table>
</box>

