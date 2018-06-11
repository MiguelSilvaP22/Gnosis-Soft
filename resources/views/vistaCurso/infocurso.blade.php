<div class="col-xs-10">
<div class="jumbotron">
		<div class="container">
			<h3>{{$curso->nombre_curso}} </h3> 
		</div>

		<div class="container">
			<p>Informaion del curso</p>
			<h5>  <strong>Objetivo: </strong>  {{$curso->objetivo_curso}}</h5> 
			<h5>  <strong>Descripcion: </strong>  {{$curso->desc_curso}}</h5> 
			<h5>  <strong>Cantidad de Horas: </strong>  {{$curso->cant_hora_curso}} horas.</h5> 
			<h5>  <strong>Codigo Curso: </strong>  {{$curso->cod_interno_curso}} </h5> 
			<h5>  <strong>Codigo Sence: </strong>  {{$curso->cod_sence_curso}} </h5> 
			<h5>  <strong>Area: </strong>  {{$area->nombre_areacurso}} </h5> 
			<h5>  <strong>Modalidad: </strong>  {{$modalidad->nombre_modalidad}} </h5> 
		</div>

		<div class="container">
			<p>Competencias Asociadas al curso:</p>

			<ul>
			@if($curso->Listacompetencias->count()>0)
				@foreach ($curso->Listacompetencias as $competencia)
				<li> <a href="../vistacompetencia?categoria={{$competencia->id_categoriacomp}}&competencia={{$competencia->id_comp}}">{{$competencia->nombre_comp}}</a> </li>
				@endforeach
			@endif
			</ul>
		</div>
	</div>
	
<div class="col-xs-9">

</div>
