
<body> 
  <div class="row">
		<div class="col-xs-12">
			
			<div class="box">
			
				<div class="box-header">
					<h3 class="box-title">Editar Perfil Ocupacional</h3>
				</div>

				<div class="box-body">
				{!! Form::model($perfilOcu, ['method' => 'PATCH', 'action' => ['PerfilOcupacionalController@update',$perfilOcu->id_perfilocu],'id'=>'formPerfilOcupacional']) !!}
				<div class='form-group'>
					{!! Form::label('nombre_perfilocu', 'Nombre:') !!}
					{!! Form::text('nombre_perfilocu', null, ['class' => 'form-control']) !!}
				</div>
				<div class='form-group'>
					{!! Form::label('nombre_comp', 'Competencias:') !!}
					{!! Form::select('id_comp[]', $competencias,null ,['class' => 'select2', 'multiple','id'=>'id_comp', 'style'=>'width:100%']) !!}
				</div>	
				<div class='form-group'>
					{!! Form::submit("Editar Perfil Ocuácional", ['class' => 'form-control btn btn-success ']) !!}
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

<script>

$(document).ready(function() {
	var idCompetencias = {{$competenciasPerfil}};
	$('#id_comp').select2().val(idCompetencias).trigger("change");

});

/*$('#formPerfilOcupacional').submit(function (e) {
	e.preventDefault();  // prevent the form from 'submitting'
	var url = e.target.action  // get the target
	var formData = $(this).serialize() // get form data
	$.post(url, formData, function (response) { // send; response.data will be what is returned
		$('#modal').modal('hide');
		refrescarPerfil({{$perfilOcu->id_perfilocu}});
		})
})*/
</script>
