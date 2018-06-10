
<body> 

		<div class="col-xs-12">
			
			<div class="box">
			
				<div class="box-header">
					<h3 class="box-title">Crear Curso</h3>
				</div>

				<div class="box-body">
					<div class="row">
					{!! Form::open([ 'enctype'=>"multipart/form-data",'action' => 'CursoController@store','id'=>'formCurso']) !!}
						<div class="col-md-12">
							<div class='form-group'>
								{!! Form::label('', 'Codigo:') !!}
								{!! Form::text('cod_interno_curso', null, ['class' => 'form-control','id'=>'cod_interno_curso','maxlength'=>'500']) !!}
								{!! Form::label('', '',['id' => 'errCodigoCurso']) !!}
							</div>
							<div class='form-group'>
								{!! Form::label('', 'Codigo Sence:') !!}
								{!! Form::text('cod_sence_curso', null, ['class' => 'form-control','id'=>'cod_sence_curso','maxlength'=>'500']) !!}
								{!! Form::label('', '',['id' => 'errCodigoSenceCurso']) !!}
							</div>
							<div class='form-group'>
								{!! Form::label('', 'Nombre:') !!}
								{!! Form::text('nombre_curso', null, ['class' => 'form-control','id'=>'nombre_curso','maxlength'=>'1000']) !!}
								{!! Form::label('', '',['id' => 'errNombreCurso']) !!}
							</div>
							<div class='form-group'>
								{!! Form::label('', 'Objetivo:') !!}
								{!! Form::textArea('objetivo_curso', null, ['class' => 'form-control','id'=>'objetivo_curso','maxlength'=>'1000']) !!}
								{!! Form::label('', '',['id' => 'errObjetivoCurso']) !!}
							</div>
							<div class='form-group'>
								{!! Form::label('', 'Descripción:') !!}
								{!! Form::text('desc_curso', null, ['class' => 'form-control','id'=>'desc_curso','maxlength'=>'1000']) !!}
								{!! Form::label('', '',['id' => 'errDescripcionCurso']) !!}
							</div>
							<div class='form-group'>
                                {!! Form::label('', 'Cantidad de Horas:') !!}
                                {!! Form::number('cant_hora_curso', null, ['class' => 'form-control','min'=> '0','id'=>'cant_hora_curso']) !!}
								{!! Form::label('', '',['id' => 'errHorasCurso']) !!}
                            </div>
							<div class='form-group'>
								{!! Form::label('', 'Modalidad:') !!}
<<<<<<< HEAD
								{!! Form::select('id_modalidad', $modalidades,null ,['class' => 'select2','placeholder'=>'Seleccione una modalidad','id'=>'id_modalidad', 'style'=>'width:100%']) !!}
=======
								{!! Form::select('id_modalidad', $modalidades, null ,['class' => 'select2','placeholder'=>'Seleccione una modalidad','id'=>'id_modalidad', 'style'=>'width:100%']) !!}
								{!! Form::label('', '',['id' => 'errModalidad']) !!}
>>>>>>> 8c6e4d255a3647b6130b942788da26f22cf29376
							</div>
							<div class='form-group'>
								{!! Form::label('', 'Area Curso:') !!}
								{!! Form::select('id_areacurso', $areasCurso,null ,['class' => 'select2','placeholder'=>'Seleccione una area','id'=>'id_areacurso', 'style'=>'width:100%']) !!}
<<<<<<< HEAD
=======
								{!! Form::label('', '',['id' => 'errAreaCurso']) !!}
>>>>>>> 8c6e4d255a3647b6130b942788da26f22cf29376
							</div>
							<div class='form-group'>
								{!! Form::label('', 'Competencias:') !!}
								{!! Form::select('id_competencia[]', $competencias,null ,['class' => 'select2','multiple','id'=>'id_competencia', 'style'=>'width:100%']) !!}
								{!! Form::label('', '',['id' => 'errCompetencias']) !!}
                            </div>
                            <div class='form-group'>
                                {!! Form::label('', 'Contenido General') !!}	
                                {!! Form::button('Agregar nuevo contenido', ['class' => 'form-control btn btn-success ', 'id'=> 'addContenido']) !!}
								{!! Form::label('', '',['id' => 'errContenidoCurso']) !!}
                            </div>	
                            <div class='form-group'>
                                {!! Form::label('', 'Temario:') !!}
                                {!! Form::file('temario_curso', null, ['class' => 'form-control','id'=> 'temario_curso']) !!}
								{!! Form::label('', '',['id' => 'errTemarioCurso']) !!}
                            </div>	
						</div>
						
						<div class='form-group'>
							{!! Form::submit("Agregar Curso", ['class' => 'form-control btn btn-success ']) !!}
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

<script type="text/javascript">
	$(document).ready(function() {
		$('#id_modalidad').select2({
		});
		$('#id_areacurso').select2({
		});
		$('#id_competencia').select2({
		});
	});
	var count =0;
	$('#addContenido').click(function() {
		count++;

		$('#addContenido').parent().append('<input class="form-control" name="contenidoGeneral[]" id="contenidoGeneral'+count+'" type="text" ">');
		$('#addContenido').parent().append('<button type="button" class="btn btn-default" aria-label="Left Align" onclick="eliminarContenido('+count+')" id="btnEliminarContenido'+count+'">   <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> </button>');
	});
    function eliminarContenido(id){
		$("#contenidoGeneral"+id).remove();
		$("#btnEliminarContenido"+id).remove();
	}

	$('#formCurso').submit(function (e) {
	e.preventDefault();
	var url = e.target.action  // get the target
	var formData = $(this).serialize() // get form data
	if(validarCurso())	
	{
		/*$.post(url, formData, function (response) { // send; response.data will be what is returned
			$('#modal').modal('hide');
		});*/
	}
	});
$(document).on('click', '#btnVolver', function () {
		$('#modal').modal('hide');
});

</script>