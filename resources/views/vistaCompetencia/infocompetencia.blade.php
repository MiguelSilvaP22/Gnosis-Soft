<div class="col-xs-10">
	<div class="jumbotron">
		<div class="container">
			<h3>{{$competencia->nombre_comp}} </h3>
			<p>Descripcion: {{$competencia->desc_comp}}</p> 
		</div>
		<div class="container">
			<p>Roles de desempeño:</p>
			<ul>
			@foreach($roldesempenos as $roldesempeno)
			<li>{{$roldesempeno->nombre_roldesempeno}}</li>
			@endforeach
			</ul>
		</div>
		<div class="container">
			<p>Niveles de Competencia</p>
			<ul>
				<li><strong>Superlativo:</strong> {{ $niveles[0]->desc_nivelcompetencia}}</li>
				<li><strong>Eficiente:</strong> {{ $niveles[1]->desc_nivelcompetencia}}</li>
				<li><strong>Promedio Sufiente:</strong> {{ $niveles[2]->desc_nivelcompetencia}}</li>
				<li><strong>Por de Bajo de lo Esperado:</strong> {{ $niveles[3]->desc_nivelcompetencia}}</li>
				<li><strong>Insifuciente:</strong> {{ $niveles[4]->desc_nivelcompetencia}}</li>
			</ul>
		</div>
	</div>
</div>	

<div class="col-xs-9">

	<h2>Cursos Asociados a la Competencia: {{$competencia->nombre_comp}}  </h2> 
	<div class="box">
		<table class="table table-hover">
					<thead>
						<tr>
							<th>Cursos</th>
							<th>Informacion del curso</th>
						</tr>
					</thead>
					<tbody>
					@foreach ($competencia->cursos as $curso)
						<tr>
						<td >{{ $curso->nombre_curso }}</td>	
						<td><a href="../vistacurso?area={{ $curso->id_areacurso }}&curso={{ $curso->id_curso }}"> mas información </a></td>
						</tr>
					@endforeach
					</tbody>
		</table>
	</box>
</div>
