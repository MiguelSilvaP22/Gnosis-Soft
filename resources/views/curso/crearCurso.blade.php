
<body> 

		<div class="col-xs-12">
			
			<div class="box">
			
				<div class="box-header">
					<h3 class="box-title">Crear Curso</h3>
				</div>

				<div class="box-body">
					<div class="row">
					{!! Form::open([ 'enctype'=>"multipart/form-data",'action' => 'CursoController@store','id'=>'formCurso', 'files' => true]) !!}
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
								{!! Form::select('id_modalidad', $modalidades, null ,['class' => 'select2','placeholder'=>'Seleccione una modalidad','id'=>'id_modalidad', 'style'=>'width:100%']) !!}
								{!! Form::label('', '',['id' => 'errModalidad']) !!}
							</div>
							<div class='form-group'>
								{!! Form::label('', 'Area Curso:') !!}
								{!! Form::select('id_areacurso', $areasCurso,null ,['class' => 'select2','placeholder'=>'Seleccione una area','id'=>'id_areacurso', 'style'=>'width:100%']) !!}
								{!! Form::label('', '',['id' => 'errAreaCurso']) !!}
							</div>
							<div class='form-group'>
								{!! Form::label('', 'Competencias:') !!}
								{!! Form::select('id_competencia[]', $competencias,null ,['class' => 'select2','multiple','id'=>'id_competencia', 'style'=>'width:100%']) !!}
								{!! Form::label('', '',['id' => 'errCompetencias']) !!}
                            </div>
                            <div class='form-group'>
                                {!! Form::label('', 'Contenido General') !!}	
                                {!! Form::button('Agregar nuevo contenido', ['class' => 'form-control btn btn-success ', 'id'=> 'addContenido']) !!}
                            </div>	
                            <div class='form-group'>
                                {!! Form::label('', 'Temario:') !!}
                                {!! Form::input('file','temario_curso', null, ['class' => 'form-control','id'=> 'temario_curso' , 'onChange'=>'ValidateSingleInput(this);']) !!}
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
		$('#addContenido').parent().append('<div class="input-group"> <input class="form-control" name="contenidoGeneral[]" id="contenidoGeneral'+count+'" type="text" "> <span type="button" class="input-group-addon" aria-label="Left Align" onclick="eliminarContenido('+count+')" id="btnEliminarContenido'+count+'"> <i class="fa fa-remove"></i> </span> </div>');
		$('#addContenido').parent().append('<label id="errcontenidoGeneral'+count+'">');


	});
    function eliminarContenido(id){
		$("#contenidoGeneral"+id).remove();
		$("#btnEliminarContenido"+id).remove();
	}

	$('#formCurso').submit(function (e) {
	e.preventDefault();
	var url = e.target.action  // get the target
	var formData = $(this).serialize() // get form data
	var tipo = '1';
	if(validarCurso(tipo,count))	
	{
		$.post(url, formData, function (response) { // send; response.data will be what is returned
			$('#modal').modal('hide');
			location.href = '/curso';
		});
	}
	});
$(document).on('click', '#btnVolver', function () {
		$('#modal').modal('hide');
});

</script>