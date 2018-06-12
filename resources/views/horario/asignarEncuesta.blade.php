
<body> 
	<div class="col-xs-12">		
		<div class="box">
			<div class="box-body">
				<div class="row">
				<table class="table" id="tablaActividad">
						<thead>
							<tr>
								<th>
									Actividad
								</th>
								<th>
									Fecha
								</th>
								<th>
									Hora de Inicio
								</th>
								<th>
									Hora de Termino
								</th>
							</tr>
						</thead>
						<tbody>
							
							<tr>
								<td>
									<span> {{$horariosColaborador->last()->horario->actividad->cod_interno_actividad}}</span>
								</td>
								<td>
									<span> {{date('d/m/Y',strtotime($horariosColaborador->last()->horario->fecha_horario))}}</span>
								</td>
								<td>
									<span>{{date('H:i',strtotime($horariosColaborador->last()->horario->hora_inicio_horario))}}</span>
								</td>
								<td>
									<span>{{date('H:i',strtotime($horariosColaborador->last()->horario->hora_termino_horario))}}</span>
								</td>
							</tr>
							
						</tbody>
					</table>
				{!! Form::open(['action' => 'HorarioController@storeAsignacionEncuesta','id'=>'formAsignacionEncuesta']) !!}
				<div class="box-header">
					<h3 class="box-title">Asignar Encuesta</h3>
				</div>

					<div class="col-md-12   ">
						<div class='form-group'>
							{!! Form::label('', 'Encuestas:') !!}
							{!! Form::select('id_encuesta[]', $encuestas,null ,['class' => 'select2','multiple','id'=>'id_encuesta', 'style'=>'width:100%']) !!}		
						</div>
						<div class='form-group' >
							{!! Form::label('', 'Observaciones:') !!}
							{!! Form::textArea('observacion_evencuesta', null, ['class' => 'form-control','id'=>'observacion_evencuesta']) !!}
						</div>
					<div class="box-header">
						<h3 class="box-title">Participantes</h3>
					</div>
					<table class="table table-condensed">
						<thead>
							<tr>
								<th>
									Run
								</th>
								<th>
									Nombre
								</th>
								<th>
									Correo
								</th>
							</tr>
						</thead>
						<tbody>
							@foreach($horariosColaborador as $horarioColab)
							<tr>
								<td>
									<span> {{$horarioColab->usuario->run_usuario}}</span>
								</td>
								<td>
									<span>{{$horarioColab->usuario->nombre_usuario." ".$horarioColab->usuario->apellidopat_usuario." ".$horarioColab->usuario->apellidomat_usuario}}</span>
								</td>
								<td>
									<span>{{$horarioColab->usuario->email_usuario}}</span>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					</div>
					<div class='form-group'>
						{!! Form::hidden('id_horario',$horariosColaborador->last()->horario->id_horario, ['class' => 'form-control']) !!}
					</div>
					<div class='form-group'>
						{!! Form::submit("Asignar Encuesta", ['class' => 'form-control btn btn-success ']) !!}
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
<style>
#tablaActividad td 
{
    text-align: center; 
    vertical-align: middle;
}
#tablaActividad th 
{
    text-align: center; 
    vertical-align: middle;
}
</style>
<script type="text/javascript">
	$(document).ready(function() {
		$("#id_encuesta").select2();
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