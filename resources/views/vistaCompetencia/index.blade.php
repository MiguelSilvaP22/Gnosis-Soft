
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

	$(document).ready(function() {

		$('#id_competencia').select2({
		});
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

	

</script>

@stop