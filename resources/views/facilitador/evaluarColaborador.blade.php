
<body> 
	<div class="col-xs-12">		
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Evaluar Colaborador {{$colaboradorHorario->usuario->run_usuario}}</h3>
			</div>
			<div class="box-body">
			
				<div class="row">
					<div class="col-md-12">
						<table id="tableEv" class="table">
							<tbody>
								<tr>
									<td>
										<div class='form-group'>
											{!! Form::label('', 'Nota:') !!}
											{!! Form::text('valor_nota', null, ['class' => 'form-control','id'=>'valor_nota','maxlength'=>'199']) !!}
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<div class='form-group'>
										{!! Form::label('', 'Observación:') !!}
											{!! Form::textArea('obervacion_evColab', null, ['class' => 'form-control','id'=>'obervacion_evColab','maxlength'=>'1000']) !!}
										</div>
									</td>
								</tr>
							</tbody>
						</table>	
						<div class='form-group'>
							{!! Form::hidden('id_horacolab',$colaboradorHorario->id_horacolab, ['class' => 'form-control','id'=>'id_horacolab']) !!}
						</div>
						<div class='form-group'>
							{!! Form::button("Agregar Evaluación", ['class' => 'form-control btn btn-success ','onClick'=>'guardarEvaluacion()']) !!}
						</div>						
					</div>
					<div class='form-group'>
						<div id="btnExit" class="form-control btn btn-success" > Volver </div>
					</div>
  				</div>
			</div>
		</div>
	</div>
</body>
<script>

function guardarEvaluacion() {
	$.ajax({
	url: "/storeEvaluacionColaborador/valor_nota/"+$('#valor_nota').val()+"/obervacion_evColab/"+$('#obervacion_evColab').val()+"/id_horacolab/"+$('#id_horacolab').val(),
	type: "GET",
	success: function () {
		$.ajax({
		url: "/verHorarioFacilitador/"+{{$colaboradorHorario->id_horario}},
		type: "GET",
		success: function (datos) {
			$("#datos").html(datos);
			$('#modalEvaluacion').modal('hide');
		}
		});
	}
	});	
	
};

$(document).on('click', '#btnExit', function () {
		$('#modalEvaluacion').modal('hide');
});
</script>
