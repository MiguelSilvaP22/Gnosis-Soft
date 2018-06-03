
<body> 

		<div class="col-xs-12">
			
			<div class="box">
			
				<div class="box-header">
					<h3 class="box-title">Crear Curso</h3>
				</div>

				<div class="box-body">
					<div class="row">
					{!! Form::open([ 'enctype'=>"multipart/form-data",'action' => 'CursoController@store','id'=>'formCurso']) !!}
						<div class="col-md-12   ">
							<div class='form-group'>
								{!! Form::label('', 'Codigo:') !!}
								{!! Form::text('cod_interno_curso', null, ['class' => 'form-control']) !!}
							</div>
							<div class='form-group'>
								{!! Form::label('', 'Codigo Sence:') !!}
								{!! Form::text('cod_sence_curso', null, ['class' => 'form-control']) !!}
							</div>
							<div class='form-group'>
								{!! Form::label('', 'Nombre:') !!}
								{!! Form::text('nombre_curso', null, ['class' => 'form-control']) !!}
							</div>
							<div class='form-group'>
								{!! Form::label('', 'Objetivo:') !!}
								{!! Form::text('objetivo_curso', null, ['class' => 'form-control']) !!}
							</div>
							<div class='form-group'>
								{!! Form::label('', 'Descripción:') !!}
								{!! Form::text('desc_curso', null, ['class' => 'form-control']) !!}
							</div>
							<div class='form-group'>
                                {!! Form::label('', 'Cantidad de Horas:') !!}
                                {!! Form::text('cant_hora_curso', null, ['class' => 'form-control']) !!}
                            </div>
							<div class='form-group'>
								{!! Form::label('', 'Modalidad:') !!}
								{!! Form::select('id_modalidad', $modalidades,null ,['class' => 'select2','data-placeholder'=>'Seleccione una modalidad','id'=>'id_modalidad', 'style'=>'width:100%']) !!}
							</div>
							<div class='form-group'>
								{!! Form::label('', 'Area Curso:') !!}
								{!! Form::select('id_areacurso', $areasCurso,null ,['class' => 'select2','data-placeholder'=>'Seleccione una area','id'=>'id_areacurso', 'style'=>'width:100%']) !!}
							</div>
							<div class='form-group'>
								{!! Form::label('', 'Competencias:') !!}
								{!! Form::select('id_competencia[]', $competencias,null ,['class' => 'select2','multiple','data-placeholder'=>'Seleccione una modalidad','id'=>'id_competencia', 'style'=>'width:100%']) !!}
                            </div>
                            <div class='form-group'>
                                {!! Form::label('', 'Temario:') !!}
                                {!! Form::file('temario_curso', null, ['class' => 'form-control']) !!}
                            </div>	
						</div>
						
						<div class='form-group'>
							{!! Form::submit("Agregar Curso", ['class' => 'form-control btn btn-success ']) !!}
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

<script type="text/javascript">
	$(document).ready(function() {
		$('#id_modalidad').select2({
		});
		$('#id_areacurso').select2({
		});
		$('#id_competencia').select2({
		});
	});


	/*$('#formCurso').submit(function (e) {
	e.preventDefault();
	var url = e.target.action  // get the target
	var formData = $(this).serialize() // get form data
	/*if(validarArea())	
	{
		$.post(url, formData, function (response) { // send; response.data will be what is returned
			$('#modal').modal('hide');
		});
	//}
});*/
$(document).on('click', '#btnVolver', function () {
		$('#modal').modal('hide');
});
</script>