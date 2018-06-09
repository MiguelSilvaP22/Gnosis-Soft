
<body> 
  <div class="row">
		<div class="col-xs-12">
			
			<div class="box">
			
				<div class="box-header">
					<h3 class="box-title">Editar Curso </h3>
				</div>

				<div class="box-body">
					<div class="row">
						{!! Form::model($actividad, ['method' => 'PATCH', 'action' => ['ActividadController@update',$actividad->id_actividad,'id'=>'formActividad']]) !!}
						<div class="col-md-12   ">
							<div class='form-group'>
								{!! Form::label('', 'Curso:') !!}
								{!! Form::select('id_curso', $cursos,$actividad->id_curso ,['class' => 'select2','placeholder'=>'Seleccione un Curso','id'=>'id_curso', 'style'=>'width:100%']) !!}
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
								{!! Form::text('fecha_inicio_actividad', date('d/m/Y',strtotime($actividad->fecha_inicio_actividad)), ['class' => 'form-control','id'=>'fechaIniActv']) !!}
							</div>
							<div class='form-group'>
								{!! Form::label('', 'Fecha de Termino:') !!}
								{!! Form::text('fecha_termino_actividad', date('d/m/Y',strtotime($actividad->fecha_termino_actividad)), ['class' => 'form-control','id'=>'fechaTermActv']) !!}
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
</script>
