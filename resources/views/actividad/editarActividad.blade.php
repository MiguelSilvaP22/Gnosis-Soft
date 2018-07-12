
<body> 
  <div class="row">
		<div class="col-xs-12">
			
			<div class="box">
			
				<div class="box-header">
					<h3 class="box-title">Editar Actividad </h3>
				</div>

				<div class="box-body">
					<div class="row">
						{!! Form::model($actividad, ['method' => 'PATCH', 'action' => ['ActividadController@update',$actividad->id_actividad,'id'=>'formActividad'], 'id'=> 'formCurso']) !!}
						<div class="col-md-12   ">
							<div class='form-group'>
								{!! Form::label('', 'Curso:') !!}
								{!! Form::select('id_curso', $cursos,$actividad->id_curso ,['class' => 'select2','placeholder'=>'Seleccione un Curso','id'=>'id_curso', 'style'=>'width:100%']) !!}
								{!! Form::label('', '',['id' => 'errIdCurso']) !!}
							</div>
							<div class='form-group'>
								{!! Form::label('', 'Código:') !!}
								{!! Form::text('cod_interno_actividad', null, ['class' => 'form-control','id'=>'cod_interno_actividad','maxlength'=>'500']) !!}
								{!! Form::label('', '',['id' => 'errCodigoInternoActividad']) !!}
							</div>
							<div class='form-group'>
								{!! Form::label('', 'Código SENCE:') !!}
								{!! Form::text('cod_sence_actividad', null, ['class' => 'form-control','id'=>'cod_sence_actividad','maxlength'=>'500']) !!}
								{!! Form::label('', '',['id' => 'errCodigoSenceActividad']) !!}
							</div>
							<div class='form-group'>
								{!! Form::label('', 'Lugar de Realización:') !!}
								{!! Form::text('lugar_realizacion_actividad', null, ['class' => 'form-control','id'=>'lugar_realizacion_actividad','maxlength'=>'500']) !!}
								{!! Form::label('', '',['id' => 'errLugarActividad']) !!}
							</div>
							<div class='form-group'>
								{!! Form::label('', 'Fecha de Inicio:') !!}
								{!! Form::text('fecha_inicio_actividad', date('d/m/Y',strtotime($actividad->fecha_inicio_actividad)), ['class' => 'form-control','id'=>'fechaIniActv']) !!}
								{!! Form::label('', '',['id' => 'errFechaInicioActividad']) !!}
							</div>
							<div class='form-group'>
								{!! Form::label('', 'Fecha de Termino:') !!}
								{!! Form::text('fecha_termino_actividad', date('d/m/Y',strtotime($actividad->fecha_termino_actividad)), ['class' => 'form-control','id'=>'fechaTermActv']) !!}
								{!! Form::label('', '',['id' => 'errFechaTerminoActividad']) !!}
							</div>
							<div class='form-group'>
								{!! Form::label('', 'Observación:') !!}
								{!! Form::textArea('observacion_actividad', null, ['class' => 'form-control','cols'=>'5','rows'=>'5','id'=>'observacion_actividad','maxlength'=>'1000']) !!}
								{!! Form::label('', '',['id' => 'errObservacionActividad']) !!}
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

<script>
	$(document).ready(function() {
		$('#id_curso').select2({
		});
		$('#fechaIniActv').datepicker("option", "dateFormat", 'dd/mm/yy');
		$('#fechaTermActv').datepicker("option", "dateFormat", 'dd/mm/yy');
	});

$('#formCurso').submit(function (e) {
	e.preventDefault();
	var url = e.target.action  // get the target
	var formData = $(this).serialize() // get form data
	if(validarActividad())
	{
		$.post(url, formData, function (response) { // send; response.data will be what is returned
			location.href = '/actividad/';
		});
	}
});
$(document).on('click', '#btnVolver', function () {
	$('#modal').modal('hide');
});
</script>
