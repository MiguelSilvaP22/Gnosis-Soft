
@extends('admin.layout')
@section ('content')
<body> 

<div class="row buscador">
	<div class="col-xs-3">
		<h4>cursos</h4>
		{!! Form::select('id_competencia', $listaCompetencias,null ,['class' => 'select2','data-placeholder'=>'Seleccione una modalidad','id'=>'id_competencia', 'style'=>'width:100%']) !!}

	</div>
</div>
		
<div class="row">
	<div class="box">
		<div class="col-xs-5">
			<div class="box">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Area de Curso</th>
						</tr>
					</thead>
					<tbody>
					@foreach ($areaCursos as $areaCurso)
						<tr>
						<td id='{{ $areaCurso->id_areacurso  }}' class='areaCursoTd'> {{ $areaCurso->nombre_areacurso }}</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
		</div>

		
	<div class="col-xs-3 competenciasTabla"></div>
	</div>


</div>

<div class="infoDeCompetencia"></div>
</div>
</body>

@stop

@section('script-js')
<script>

	$(document).ready(function() {

		$('#id_competencia').select2({
		});
	});

	$( document ).ready(function() {

			var getUrlParameter = function getUrlParameter(sParam) {
		var sPageURL = decodeURIComponent(window.location.search.substring(1)),
			sURLVariables = sPageURL.split('&'),
			sParameterName,
			i;

		for (i = 0; i < sURLVariables.length; i++) {
			sParameterName = sURLVariables[i].split('=');

			if (sParameterName[0] === sParam) {
				return sParameterName[1] === undefined ? true : sParameterName[1];
			}
		}
	};

	if(getUrlParameter('categoria')!=null && getUrlParameter('competencia')!=null)
	{
		cargar(getUrlParameter('categoria'), getUrlParameter('competencia'))
	}
	});


	$(".areaCursoTd").click(function(e) {

		$.ajax({
		url: "/vercursos/"+e.target.id,
		type: "GET",
		success: function (datos) {
			$(".competenciasTabla").html(datos);

			$(".cursoTd").click(function(e) {
				$.ajax({
				url: "/infocurso/"+e.target.id,
				type: "GET",
				success: function (datos) {
					$(".infoDeCompetencia").html(datos);

					
				}
				});
			});

		}
		});
	});


	function cargar(idCat, idComp){
	
		$.ajax({
		url: "/vercompetencias/"+idCat,
		type: "GET",
		success: function (datos) {
			$(".competenciasTabla").html(datos);

			$.ajax({
			url: "/infocompetencia/"+idComp,
			type: "GET",
			success: function (datos2) {
				$(".infoDeCompetencia").html(datos2);

				
			}
			});

		}
		});
	}

	

</script>

<style>
.buscador{
	margin-bottom: 20px;
}
</style>

@stop