
<body> 
	<div class="col-xs-12">
		
		<div class="box">
		
			<div class="box-header">
				<h3 class="box-title">Agendar Horario a Actividad</h3>
			</div>

			<div class="box-body">
				<div class="row">
					<div class="col-md-12   ">
						<table class="table">
							<thead>
								<tr>
									<th>
										Fecha Inicio Actividad:
									</th>
									<th>
										Fecha Termino Actividad:
									</th>
									<th>
										Cantidad de horas Actividad:
									</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<span> {{date('d-m-Y', strtotime($actividad->fecha_inicio_actividad))}}</span>
									</td>
									<td>
										<span>{{date('d-m-Y', strtotime($actividad->fecha_termino_actividad))}}</span>
									</td>
									<td>
										<span>{{$actividad->curso->cant_hora_curso}}</span>
									</td>
								</tr>
							</tbody>
						</table>
						
						{!! Form::open(['action' => 'ActividadController@storeHorario','id'=>'formHorario']) !!}
						<div>
							<div class="col-xs-3">
								{!! Form::label('', 'Fecha :') !!}
								{!! Form::text('fecha_horario', null, ['class' => 'form-control ','id'=>'fechaIniHora']) !!}
							</div>
							
							<div class="col-xs-3">
								{!! Form::label('', 'Hora de Inicio:') !!}
								{!! Form::text('hora_inicio_horario', null, ['class' => 'form-control timepicker','id'=>'horaIniHora']) !!}
							</div>
							
							<div class="col-xs-3">
								{!! Form::label('', 'Hora de Termino:') !!}
								{!! Form::text('hora_termino_horario', null, ['class' => 'form-control timepicker','id'=>'horaTermHora']) !!}
							</div>
							
							<div class='form-group'>
								{!! Form::hidden('id_actividad',$actividad->id_actividad) !!}
							</div>
							<div>
								<button type="button" class="btn btn-default" aria-label="Left Align" id="btnAgregarHorario">   
									<span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> 
								</button>
							</div>
						</div>	
						{!! Form::close() !!}

						<div class='form-group'>
							<a href='{{ url()->previous() }}' class="form-control btn btn-success " > Volver </a>
						</div>
					
					</div>
  				</div>
			</div>
		</div>
	</div>

</body>
<style>
.col-xs-3
{
	padding-bottom: 15px;
}
</style>
<script type="text/javascript">
	$(document).ready(function() {
		$('#fechaIniHora').datepicker({
			minDate: '2012-12-10',
            maxDate: '2012-12-20',
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