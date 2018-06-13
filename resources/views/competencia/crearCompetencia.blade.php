
<body> 
  <div class="row">
		<div class="col-xs-12">
			
			<div class="box">
			
				<div class="box-header">
					<h3 class="box-title">Crear Competencia</h3>
				</div>

				<div class="box-body">
					{!! Form::open(['action' => 'CompetenciaController@store','id'=>'formCompetencia']) !!}
				
					{!! Form::hidden('tipo', '0', ['class' => 'form-control']) !!}

				<div class='form-group'>
					{!! Form::label('nombre_comp', 'Nombre:') !!}
					{!! Form::text('nombre_comp', null, ['class' => 'form-control','id'=>'nombre_comp','maxlength'=>'500']) !!}
					{!! Form::label('', '',['id' => 'errNombreCompetencia']) !!}
				</div>
				<div class='form-group'>
					{!! Form::label('desc_comp', 'Descripción:') !!}
					{!! Form::text('desc_comp', null, ['class' => 'form-control','id'=>'desc_comp','maxlength'=>'1000']) !!}
					{!! Form::label('', '',['id' => 'errDescripcionCompetencia']) !!}
				</div>

				<div class='form-group'>
					{!! Form::label('nombre_categoriacomp', 'Categoria:') !!}
					{!! Form::select('id_categoriacomp', $categoriascompetencias,null ,['class' => 'form-control','placeholder'=>'Seleccione una opción.','id'=>'id_categoriacomp', 'style'=>'width:100%']) !!}
					{!! Form::label('', '',['id' => 'errCategoriaCompetencia']) !!}
				</div>	
				
				<div class='form-group'>
					{!! Form::label('nombre_rolesdesempeno', 'Roles de desempeño:') !!}	
					{!! Form::button('Agregar nuevo rol', ['class' => 'form-control btn btn-success ', 'id'=> 'addRol']) !!}	
				</div>	

				<div class='form-group'>
					{!! Form::label('nombre_categoriacomp', 'SUPERLATIVO:') !!}
					{!! Form::text('niveles[]', null, ['class' => 'form-control','id'=>'superlativo','maxlength'=>'1000']) !!}
					{!! Form::label('', '',['id' => 'errSuperlativo']) !!}
				</div>	
				<div class='form-group'>
					{!! Form::label('nombre_categoriacomp', 'EFICIENTE:') !!}
					{!! Form::text('niveles[]', null, ['class' => 'form-control','id'=>'eficiente','maxlength'=>'1000']) !!}
					{!! Form::label('', '',['id' => 'errEficiente']) !!}
				</div>	
				<div class='form-group'>
					{!! Form::label('nombre_categoriacomp', 'PROMEDIO SUFICIENTE:') !!}
					{!! Form::text('niveles[]', null, ['class' => 'form-control','id'=>'promedioSuficiente','maxlength'=>'1000']) !!}
					{!! Form::label('', '',['id' => 'errPromedioSuficiente']) !!}
				</div>	
				<div class='form-group'>
					{!! Form::label('nombre_categoriacomp', 'POR DEBAJO DE LO ESPERADO:') !!}
					{!! Form::text('niveles[]', null, ['class' => 'form-control','id'=>'porDebajoEsperado','maxlength'=>'1000']) !!}
					{!! Form::label('', '',['id' => 'errDebajoEsperado']) !!}
				</div>	
				<div class='form-group'>
					{!! Form::label('nombre_categoriacomp', 'INSUFICIENTE:') !!}
					{!! Form::text('niveles[]', null, ['class' => 'form-control','id'=>'insuficiente','maxlength'=>'1000']) !!}
					{!! Form::label('', '',['id' => 'errInsuficiente']) !!}
				</div>	
			
				<div class='form-group'>
					{!! Form::submit("Agregar Competencia", ['class' => 'form-control btn btn-success ']) !!}
				</div>
				{!! Form::close() !!}
				<div class='form-group'>
					<div id="btnVolver" class="form-control btn btn-success " > Volver </div>
				</div>	
				</div>
			</div>
		</div>
	</div>

</body>
<style>
	#addRol{
		width: 130px;
	}
</style>
<script>
	var count =0;
	$('#addRol').click(function() {
		count++;

		$('#addRol').parent().append('<input class="form-control" name="RolDesempenos[]" id="rolDesempeno'+count+'" type="text" ">');
		$('#addRol').parent().append('<button type="button" class="btn btn-default" aria-label="Left Align" onclick="eliminarRol('+count+')" id="btnEliminarRol'+count+'">   <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> </button>');
		$('#addRol').parent().append('<label id="errRolDesempeno'+count+'">');
		
	});

	function eliminarRol(id){
		$("#rolDesempeno"+id).remove();
		$("#btnEliminarRol"+id).remove();
	}

$('#formCompetencia').submit(function (e) {
	e.preventDefault();
	var url = e.target.action  // get the target
	var formData = $(this).serialize() // get form data
	if(validarCompetencias(count))
	{
		$.post(url, formData, function (response) { // send; response.data will be what is returned
			$('#modal').modal('hide');
		});
	}
});

$(document).on('click', '#btnVolver', function () {
	$('#modal').modal('hide');
});
</script>
