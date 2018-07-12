
@extends('admin.layout')
@section ('content')
<body> 

	<h1>Información Curso</h1>
	<ol class="breadcrumb">
		<li><a href="/vistaEmpresa"><i class="fa fa-dashboard"></i>Dashboard</a></li>
		<li>Curso</li>
		<li class="active">Información Curso</li>
	</ol>
	<div class="row">
		<div class="col-xs-12">
			<div class="box">			
				<div class="box-body">
					<div class="row">
						<div class="col-xs-12">
							<div class="box">			
								<div class="box-header">
								<h1 class="box-title">Filtro de Curso</h1>
								</div>
								<div class="box-body">
									<div class="col-xs-12">
										<div class='form-group'>
											{!! Form::label('', 'Cursos:') !!}
											{!! Form::select('cursos', $listaCursos,null,['class'=>'form-control', 'id'=>'id_curso', 'style'=>'width:100%']) !!}
										</div>	
									</div>
								</div>	
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-xs-12">	
							<div class="box">			
								<div class="box-header">
								<h1 class="box-title">Cursos por Area</h1>
								</div>
								<div class="box-body">
									<div class="col-xs-12">		
										<div class="row">
											<div class="col-5 col-md-6 col-xs-12">
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
												<div class="row">		
													<div class="col-xs-12 competenciasTabla">
													</div>
												</div>
											</div>		
											<div class="col-md-6 infoDeCompetencia">
											</div>	
										</div>
									</div>	
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

@stop

@section('script-js')
<script>

	$(document).ready(function() {

		$('#id_curso').select2({
			placeholder: "Buscar Curso"
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

	if(getUrlParameter('area')!=null && getUrlParameter('curso')!=null)
	{
		cargar(getUrlParameter('area'), getUrlParameter('curso'))
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


	function cargar(idArea, idCurso){
	
		$.ajax({
		url: "/vercursos/"+idArea,
		type: "GET",
		success: function (datos) {
			$(".competenciasTabla").html(datos);

			$.ajax({
			url: "/infocurso/"+idCurso,
			type: "GET",
			success: function (datos2) {
				$(".infoDeCompetencia").html(datos2);

				
			}
			});

		}
		});
	}


	

	$('#id_curso').on('select2:select', function (e) {
		$.ajax({
			url: "/infocurso/"+e.params.data.id,
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
</style>

@stop