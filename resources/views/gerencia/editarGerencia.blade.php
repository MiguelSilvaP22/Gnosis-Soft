
<body> 
  <div class="row">
		<div class="col-xs-12">
			
			<div class="box">
			
				<div class="box-header">
					<h3 class="box-title">Editar gerencia </h3>
				</div>

				<div class="box-body">
				{!! Form::model($gerencia, ['method' => 'PATCH', 'action' => ['GerenciaController@update',$gerencia->id_gerencia],'id'=>'formGerencia']) !!}
				<div class='form-group'>
					{!! Form::label('', 'Nombre:') !!}
					{!! Form::text('nombre_gerencia', null, ['class' => 'form-control','id'=>'nombre_gerencia','maxlength'=>'100']) !!}
					{!! Form::label('', '',['id' => 'errNombreGerencia']) !!}
				</div>
				<div class='form-group'>
					{!! Form::submit("Editar gerencia", ['class' => 'form-control btn btn-success ']) !!}
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

$('#formGerencia').submit(function (e) {
	e.preventDefault();  // prevent the form from 'submitting'
	var url = e.target.action  // get the target
	var formData = $(this).serialize() // get form data
	if(validarGerencia())
	{
		$.post(url, formData, function (response) { // send; response.data will be what is returned
		$('#modal').modal('hide');
		refrescarGerencia({{$gerencia->id_empresa}});
		});
	}
});
$(document).on('click', '#btnVolver', function () {
		$('#modal').modal('hide');
});
</script>
