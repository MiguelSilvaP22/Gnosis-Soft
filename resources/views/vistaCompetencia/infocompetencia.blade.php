<div class="col-xs-12 col-10 col-md-10">
	<div class="jumbotron">
		<div class="container">
			<h3>{{$competencia->nombre_comp}} </h3>
			<p>Descripción: {{$competencia->desc_comp}}</p> 
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
				<li><strong>Promedio Suficiente:</strong> {{ $niveles[2]->desc_nivelcompetencia}}</li>
				<li><strong>Por de Bajo de lo Esperado:</strong> {{ $niveles[3]->desc_nivelcompetencia}}</li>
				<li><strong>Insuficiente:</strong> {{ $niveles[4]->desc_nivelcompetencia}}</li>
			</ul>
		</div>
	</div>
</div>	

<div class="col-9 col-md-9 col-xs-12">

	<h2>Cursos Asociados a la Competencia: {{$competencia->nombre_comp}}  </h2> 
	<div class="box">
		<table class="table table-hover">
					<thead>
						<tr>
							<th>Cursos</th>
							<th>Información del curso</th>
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
