
<body> 
  <div class="row">
		<div class="col-xs-12">
			
			<div class="box">
				
				<div class="box-header">
					<h3 class="box-title">Crear Perfil Ocupacional</h3>
				</div>
				<div class="box-body">
					{!! Form::open(['action' => 'PerfilOcupacionalController@store','id'=>'formPerfilOcupacional']) !!}
				<div class='form-group'>
					{!! Form::label('', 'Nombre:') !!}
					{!! Form::text('nombre_perfilocu', null, ['class' => 'form-control','id' => 'nombre_perfilOcu','maxlength'=>'100']) !!}
					{!! Form::label('', '',['id' => 'errNombrePerfilOcu']) !!}
				</div>
				<div class='form-group'>
					{!! Form::label('', 'Competencias:') !!}
					{!! Form::select('id_comp[]', $competencias,null ,['class' => 'form-control', 'multiple','id'=>'id_comp', 'style'=>'width:100%']) !!}
					{!! Form::label('', '',['id' => 'errSelectComp']) !!}
				</div>	
				<div class='form-group'>
					{!! Form::hidden('id_area',$idArea, ['class' => 'form-control']) !!}
				</div>
				<div class='form-group'>
					{!! Form::submit("Agregar Perfil Ocupacional", ['class' => 'form-control btn btn-success ']) !!}
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
<script>
$('#formPerfilOcupacional').submit(function (e) {
	e.preventDefault();  // prevent the form from 'submitting'
	var url = e.target.action  // get the target
	var formData = $(this).serialize() // get form data
	if(validarPerfilOcupacional())
	{
		$.post(url, formData, function (response) { // send; response.data will be what is returned
		$('#modal').modal('hide');
		refrescarPerfil({{$idArea}});
		});
	}	
});
$(document).on('click', '#btnVolver', function () {
	$('#modal').modal('hide');
});
</script>
