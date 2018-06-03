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

