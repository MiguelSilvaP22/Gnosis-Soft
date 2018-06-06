
<body> 
	<div class="col-xs-12">
		
		<div class="box">
		
			<div class="box-header">
				<h3 class="box-title">Agendar Horario a Actividad</h3>
			</div>

			<div class="box-body">
				<div class="row">
					<div class="col-md-12">
						<table class="table">
							<thead>
								<tr>
									<th>
										Fecha Actividad:
									</th>
									<th>
										Hora Inicio Actividad:
									</th>
									<th>
										Hora Termino Actividad:
									</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<span> {{date('d-m-Y', strtotime($horarioActividad->fecha_horario))}}</span>
									</td>
									<td>
										<span>{{$horarioActividad->hora_inicio_horario}}</span>
									</td>
									<td>
										<span>{{$horarioActividad->hora_termino_horario}}</span>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
  				</div>
			</div>	
		</div>
		{!! Form::open(['action' => 'HorarioController@store','id'=>'formularioAsignarHorario']) !!}
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Asignar Facilitador</h3>
			</div>

			<div class="box-body">
				<div class="row">
					<div class="col-md-12">
						
						<table class="table">
							<tbody>
								<tr>
									<td style="width: 25%;">
										<span> Facilitador: </span>
									</td>
									<td style="width: 75%;">
										{!! Form::select('id_facilitador[]', $facilitadores ,null ,['class' => 'select2','multiple','id'=>'id_facilitador', 'style'=>'width:100%']) !!}
									</td>
								</tr>
							</tbody>
						</table>
					</div>
  				</div>
			</div>		
		</div>
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Asignar Colaboradores</h3>
			</div>

			<div class="box-body">
				<div class="row">
					<div class="col-md-12">
						<table class="table" id="tableAddColaboradores">
							<tbody>
								<tr>
									<td style="width: 25%;">
										<span> Empresa: </span>
									</td>
									<td style="width: 75%;">
										{!! Form::select('id_empresa', $empresas ,null ,['onChange'=>'cargarColaboradores(this.value)','class' => 'select2','placeholder'=>'Seleccione una empresa','id'=>'id_empresa','style'=>'width:100%']) !!}
									</td>
								</tr>
							</tbody>
						</table>

					</div>
  				</div>
			</div>		
		</div>
		<div class='form-group'>
			{!! Form::hidden('id_horario',$horarioActividad->id_horario) !!}
		</div>
		<div class='form-group'>
			{!! Form::submit("Agregar Asignacion", ['class' => 'form-control btn btn-success ']) !!}
		</div>
		{!! Form::close() !!}

	</div>
</body>

<script>
$(document).ready(function() {
	$('.select2').select2();
});

function cargarColaboradores(id) {
	$.ajax({
	url: "/selectColaboradores/"+id,
	type: "GET",
	success: function (datos) {
		$('#tableAddColaboradores tr:last').after(datos);
		$('.select2').select2({});
		}
	});
}

</script>