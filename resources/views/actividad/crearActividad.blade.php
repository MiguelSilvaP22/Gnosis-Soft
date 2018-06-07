
<body> 

		<div class="col-xs-12">
			
			<div class="box">
			
				<div class="box-header">
					<h3 class="box-title">Crear Curso</h3>
				</div>

				<div class="box-body">
					<div class="row">
					{!! Form::open(['action' => 'ActividadController@store','id'=>'formActividad']) !!}
						<div class="col-md-12   ">
							<div class='form-group'>
								{!! Form::label('', 'Curso:') !!}
								{!! Form::select('id_curso', $cursos,null ,['class' => 'select2','placeholder'=>'Seleccione un Curso','id'=>'id_curso', 'style'=>'width:100%']) !!}
							</div>
							<div class='form-group'>
								{!! Form::label('', 'Codigo:') !!}
								{!! Form::text('cod_interno_actividad', null, ['class' => 'form-control']) !!}
							</div>
							<div class='form-group'>
								{!! Form::label('', 'Codigo Sence:') !!}
								{!! Form::text('cod_sence_actividad', null, ['class' => 'form-control']) !!}
							</div>
							<div class='form-group'>
								{!! Form::label('', 'Lugar de Realización:') !!}
								{!! Form::text('lugar_realizacion_actividad', null, ['class' => 'form-control']) !!}
							</div>
							<div class='form-group'>
								{!! Form::label('', 'Fecha de Inicio:') !!}
								{!! Form::text('fecha_inicio_actividad', null, ['class' => 'form-control','id'=>'fechaIniActv']) !!}
							</div>
							<div class='form-group'>
								{!! Form::label('', 'Fecha de Termino:') !!}
								{!! Form::text('fecha_termino_actividad', null, ['class' => 'form-control','id'=>'fechaTermActv']) !!}
							</div>
							<div class='form-group'>
								{!! Form::label('', 'Observacion:') !!}
								{!! Form::textArea('observacion_actividad', null, ['class' => 'form-control']) !!}
							</div>
							
						</div>
						
						<div class='form-group'>
							{!! Form::submit("Agregar Actividad", ['class' => 'form-control btn btn-success ']) !!}
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
		$('#id_curso').select2({
		});
		$('#fechaIniActv').datepicker("option", "dateFormat", 'dd/mm/yy');
		$('#fechaTermActv').datepicker("option", "dateFormat", 'dd/mm/yy');
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
	$('#modal').removeData();
});
</script>