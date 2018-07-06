
@extends('admin.layout')
@section ('content')
<body> 

<div class="row buscador">
	<div class="col-3 col-md-3 col-xs-10">
		<h4>cursos</h4>
		{!! Form::select('competencias', $listaCompetencias,null,['class'=>'form-control', 'id'=>'id_competencia', 'style'=>'width:100%']) !!}

	</div>
</div>
		
<div class="row">
	<div class="box">
		<div class="col-5 col-md-5 col-xs-12">
			<div class="box">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Categorías de Competencias</th>
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

		
	<div class="col-3 col-md-3 col-xs-12 competenciasTabla"></div>
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
			placeholder: "Buscar Competencia"
		}).val('').trigger('change');;

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
		$('.infoDeCompetencia').addClass('loader');
		cargar(getUrlParameter('categoria'), getUrlParameter('competencia'));
	}
	});


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
		
		$.ajax({
		url: "/vercompetencias/"+idCat,
		type: "GET",
		success: function (datos) {
			$('.infoDeCompetencia').removeClass('loader');
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





	$('#id_competencia').on('select2:select', function (e) {
		$.ajax({
			url: "/infocompetencia/"+e.params.data.id,
			type: "GET",
			success: function (datos2) {
				$(".infoDeCompetencia").html(datos2);			
			}
			});
	});

	

</script>

<style>
.buscador{
	margin-bottom: 20px;
}


.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>

@stop