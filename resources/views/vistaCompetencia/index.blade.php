
@extends('admin.layout')
@section ('content')
<body> 
<div class="row">
	<div class="box">
		<div class="col-xs-5">
		<div class="div">
			<h3>cursos</h3>
			{!! Form::select('id_competencia', $listaCompetencias,null ,['class' => 'select2','data-placeholder'=>'Seleccione una modalidad','id'=>'id_competencia', 'style'=>'width:100%']) !!}

		</div>
		<div class="box">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Categorias de Competencias</th>
						</tr>
					</thead>
					<tbody>
					@foreach ($categoriascompetencias as $categoriascompetencia)
						<tr>
						<td id='{{ $categoriascompetencia->id_categoriacomp  }}' class='categoriaCompTd'> {{ $categoriascompetencia->nombre_categoriacomp }}</td>
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

<<<<<<< HEAD
	$(document).ready(function() {

		$('#id_competencia').select2({
		});
	});

=======
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


>>>>>>> b22268f421ba564753cb44b07ec4a1e866be79da
	$(".categoriaCompTd").click(function(e) {
		$.ajax({
		url: "/vercompetencias/"+e.target.id,
		type: "GET",
		success: function (datos) {
			$(".competenciasTabla").html(datos);

			$(".competenciaTd").click(function(e) {
				$.ajax({
				url: "/infocompetencia/"+e.target.id,
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
	
		alert(idComp);
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

@stop