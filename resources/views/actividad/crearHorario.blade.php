
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
					   <span id="btnAgregarHorario" value="{{$actividad->id_actividad}}" class="btn btn-block btn-success" style="float: right;margin-bottom: 10px;margin-right: 10px;width:200px;">
							<i class="fa fa-plus"></i>	Agregar
						</span>
						{!! Form::open(['action' => 'ActividadController@storeHorario','id'=>'formularioHorario']) !!}
						<div>
							@if(Count($horarios)>0)
							<table class="table" id="myTable">
								<thead>
									<tr>
										<th>
											Fecha:
										</th>
										<th>
											Hora de Inicio
										</th>
										<th>
											Hora de Termino:
										</th>
										<th></th>
									</tr>
								</thead>
								<tbody id="myTable" >
								@foreach($horarios as $key => $horario)
									<tr id="form{{$key}}">
										<td>
											{!! Form::text('fecha_horario[]', date('d/m/Y',strtotime($horario->fecha_horario)), ['class' => 'form-control date','id'=>'fechaIniHora']) !!}

										</td>
										<td>
											{!! Form::text('hora_inicio_horario[]', $horario->hora_inicio_horario, ['class' => 'form-control timepicker', 'id'=>'horaIniHora']) !!}

										</td>
										<td>
											{!! Form::text('hora_termino_horario[]', $horario->hora_termino_horario, ['class' => 'form-control timepicker','id'=>'horaTermHora']) !!}

										</td>
										<td>
											<button type="button" class="btn btn-default" aria-label="Left Align" onclick="eliminarForm({{$key}})" id="btnEliminarForm{{$key}}">  
											 	<span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> 
											</button>
										</td>
									</tr>						
								@endforeach
									<div id="agregarVainas"></div>
								</tbody>
							</table>
							@else
							<table class="table" id="myTable" >
								<thead>
									<tr>
										<th>
											Fecha:
										</th>
										<th>
											Hora de Inicio
										</th>
										<th>
											Hora de Termino:
										</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<tr>
									</tr>
								</tbody>
							</table>	
							@endif
							<div class='form-group'>
								{!! Form::hidden('id_actividad',$actividad->id_actividad) !!}
							</div>
						</div>	

						<div class='form-group'>
							{!! Form::submit("Agregar Horario", ['class' => 'form-control btn btn-success ']) !!}
						</div>
						{!! Form::close() !!}							
						<div class='form-group'>
							<div id="btnVolver" class="form-control btn btn-success " > Volver </div>
						</div>
					
					</div>
  				</div>
			</div>
		</div>
	</div>

</body>

<style>

</style>

<script type="text/javascript">
	var count =0;
	$(document).ready(function() {
		$('.date').datepicker({});
		
	});

function eliminarForm(id){
		$("#form"+id).remove();
		
	}
	
$(document).on('click', '#btnAgregarHorario', function () {
		alert(count);
		count++;
		$.ajax({
		url: "/formHorario/"+count,
		type: "GET",
		success: function (datos) {
			$('#myTable tr:last').after(datos);
			$('.date').datepicker({});
			}	
		

		});
});
$(document).on('click', '#btnVolver', function () {
		$('#modal').modal('hide');
		
});

</script>