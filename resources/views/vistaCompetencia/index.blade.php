
@extends('admin.layout')
@section ('content')
<body> 
<div class="row">
	<div class="box">
		<div class="col-xs-5">
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

<div class="col-xs-8 infoDeCompetencia"></div>
</div>
</body>

@stop

@section('script-js')
<script>

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