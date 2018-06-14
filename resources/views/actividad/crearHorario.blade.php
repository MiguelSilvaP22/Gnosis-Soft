
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
										Fecha Inicio 
									</th>
									<th>
										Fecha Termino 
									</th>
									<th>
										Cantidad de Horas
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
					   <span onclick="cargarForm()" id="btnAgregarFormulario" value="{{$actividad->id_actividad}}" class="btn btn-block btn-success" style="float: right;margin-bottom: 10px;margin-right: 10px;width:200px;">
							<i class="fa fa-plus"></i>	Agregar
						</span>
						
							@if(Count($horarios)>0)
							<table class="table" id="tableUpdateHorario">
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
								<tbody >
								@foreach($horarios as $key => $horario)
									<tr>
										<td>
											{{date('d/m/Y',strtotime($horario->fecha_horario))}}										
										</td>
										<td>
											{{date('H:i',strtotime($horario->hora_inicio_horario))}}
											
										</td>
										<td>
											{{date('H:i',strtotime($horario->hora_termino_horario))}}

										</td>
										<td>
											@if(Count($horario->horariosColaborador->where('estado_horacolab',1))>0)
											<button type="button" class="btn btn-default" aria-label="Left Align" onclick="asignarEncuesta({{$horario->id_horario}})" id="btnAssignEncuesta">  
											 	<i class="fa fa-file-o"></i>
											</button>
											@endif
											<button type="button" class="btn btn-default" aria-label="Left Align" onclick="asignarHorario({{$horario->id_horario}})" id="btnAssignHorario">  
											 	<i class="fa fa-user-plus"></i>
											</button>
											<button type="button" class="btn btn-default" aria-label="Left Align" onclick="eliminarHorario({{$horario->id_horario}})" id="btnDeleteHorario">  
											 	<i class="fa fa-close"></i>
											</button>
										</td>
									</tr>						
								@endforeach
									</tbody>
							</table>
							@endif
							<div id="tablaAdd" style="display:none";>
								{!! Form::open(['action' => 'ActividadController@storeHorario','id'=>'formularioHorario']) !!}
								<table class="table" id="tableAddHorario" >
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
								<div class='form-group'>
									{!! Form::hidden('id_actividad',$actividad->id_actividad) !!}
									
								</div>
								<div class='form-group'>
									<a href="javascript:guardar(2)" >guardar</a>
									{!! Form::submit("Agregar Horario", ['class' => 'form-control btn btn-success ']) !!}
								</div>
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

<script type="text/javascript">
	var count =0;
	$(document).ready(function() {
		$('.date').datepicker({});		
	});
function guardar()
{
	if(id == 1)
	{
		$('#formularioHorario').submit();
	}
	else{
		console.log('asd');
	}
}
function eliminarForm(id){
		$("#form"+id).remove();		
	}
	
function cargarForm() {
	$('#tablaAdd').show('true');
	count++;
		$.ajax({
		url: "/formHorario/"+count,
		type: "GET",
		success: function (datos) {
			$('#tableAddHorario tr:last').after(datos);
			$('.date').datepicker({});
			}
		});
}

function asignarHorario(id) {
		$.ajax({
		url: "/asignarHorario/"+id,
		type: "GET",
		success: function (datos) {
			$("#datos").html(datos);
			}
		});
}

function eliminarHorario(id) {
		
		$.ajax({
		url: "/desactivarHorario/"+id,
		type: "GET",
		success: function (datos) {
			$("#datosModalBorrar").html(datos);
			$('#modalBorrar').modal('show'); 
		}

		});
		//alert("asda");
};
$(document).on('click', '#btnVolver', function () {
	$('#modal').modal('hide');
});

</script>