
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
					{!! Form::text('nombre_comp', null, ['class' => 'form-control']) !!}
				</div>
				<div class='form-group'>
					{!! Form::label('desc_comp', 'Descripción:') !!}
					{!! Form::text('desc_comp', null, ['class' => 'form-control']) !!}
				</div>

				<div class='form-group'>
					{!! Form::label('nombre_categoriacomp', 'Categoria:') !!}
					{!! Form::select('id_categoriacomp', $categoriascompetencias,null ,['class' => 'form-control','data-placeholder'=>'Seleccione uno o varios giros','id'=>'id_categoriacomp', 'style'=>'width:100%']) !!}
				</div>	
				
				<div class='form-group'>
					{!! Form::label('nombre_rolesdesempeno', 'Roles de desempeño:') !!}	
					{!! Form::button('Agregar nuevo rol', ['class' => 'form-control btn btn-success ', 'id'=> 'addRol']) !!}	
				</div>	

				<div class='form-group'>
					{!! Form::label('nombre_categoriacomp', 'SUPERLATIVO:') !!}
					{!! Form::text('niveles[]->desc_nivelcompetencia', null, ['class' => 'form-control']) !!}
				</div>	
				<div class='form-group'>
					{!! Form::label('nombre_categoriacomp', 'EFICIENTE:') !!}
					{!! Form::text('niveles[]', null, ['class' => 'form-control']) !!}
				</div>	
				<div class='form-group'>
					{!! Form::label('nombre_categoriacomp', 'PROMEDIO SUFICIENTE:') !!}
					{!! Form::text('niveles[]', null, ['class' => 'form-control']) !!}
				</div>	
				<div class='form-group'>
					{!! Form::label('nombre_categoriacomp', 'POR DEBAJO DE LO ESPERADO:') !!}
					{!! Form::text('niveles[]', null, ['class' => 'form-control']) !!}
				</div>	
				<div class='form-group'>
					{!! Form::label('nombre_categoriacomp', 'INSUFICIENTE:') !!}
					{!! Form::text('niveles[]', null, ['class' => 'form-control']) !!}
				</div>	
			
				<div class='form-group'>
					{!! Form::submit("Agregar Competencia", ['class' => 'form-control btn btn-success ']) !!}
				</div>
				<div class='form-group'>
					<a href='{{ url()->previous() }}' class="form-control btn btn-success " > Volver </a>
				</div>
  				{!! Form::close() !!}
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
	});

	function eliminarRol(id){
		$("#rolDesempeno"+id).remove();
		$("#btnEliminarRol"+id).remove();
	}


</script>
