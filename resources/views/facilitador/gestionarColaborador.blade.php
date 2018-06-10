
<body> 
	<div class="col-xs-12">
		
		<div class="box">
		
			<div class="box-header">
				<h3 class="box-title">Listado de Colaboradores</h3>
			</div>

			<div class="box-body">
				<div class="row">
					<div class="col-md-12">
						<table id="tableColab" class="table">
							<thead>
								<tr>
									<th>
										Nombre
									</th>
									<th>
										Run
									</th>
									<th>
										Asistencia
									</th>
									<th>
										
									</th>
								</tr>
							</thead>
							<tbody>
							@foreach($colaboradoresHorario as $colaboradorHorario)
								<tr>
									<td>
										<span> {{ $colaboradorHorario->usuario->nombre_usuario." ". $colaboradorHorario->usuario->apellidopat_usuario." ". $colaboradorHorario->usuario->apellidomat_usuario}}</span>
									</td>
									<td>
										<span>{{$colaboradorHorario->usuario->run_usuario}}</span>
									</td>
									@if($colaboradorHorario->asistencia_horacolab == 1)
									<td>
										{{ Form::checkbox('asistencia_horacolab', '1',true, ["onClick"=>"asistenciaColab($colaboradorHorario->id_horacolab)", "id"=>"asistenciaColab$colaboradorHorario->id_horacolab"] ) }}
									</td>
									@else
									<td>
										{{ Form::checkbox('asistencia_horacolab', '0',null, ["onClick"=>"asistenciaColab($colaboradorHorario->id_horacolab)", "id"=>"asistenciaColab$colaboradorHorario->id_horacolab"] ) }}
									</td>
									@endif
									<td>
									@if(Count($colaboradorHorario->evaluacionesColab)>0)
										<button id="evaluacionColaborador" class="btn btn btn-info" onclick="verEvaluacionColaborador({{$colaboradorHorario->id_horacolab}})" ><i class="fa fa-eye"></i></button>
									@endif
										<button id="evaluarColaborador" class="btn btn btn-info" onclick="evaluarColaborador({{$colaboradorHorario->id_horacolab}})" ><i class="fa fa-pencil"></i></button>
									
									</td>
								</tr>
							@endforeach	
							</tbody>
						</table>						
						
					</div>
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
		$('#tableColab').DataTable({
			bPaginate: false,	
			bInfo: false,
		});	
	});

function asignarHorario(id) {
		$.ajax({
		url: "/asignarHorario/"+id,
		type: "GET",
		success: function (datos) {
			$("#datos").html(datos);
			}
		});
}

function agregarAsistencia(asistencia)
{
	$.ajax({
			url: "/agregarAsistencia/"+asistencia,
			type: "GET",
			success: function (datos) {
				
			}
		});
}

function asistenciaColab(id) {
	if($('#asistenciaColab'+id).is(':checked'))
	{
		asistencia = id+",1";
		agregarAsistencia(asistencia);
	}else
	{
		asistencia = id+",0";
		agregarAsistencia(asistencia);
	}


};

$(document).on('click', '#btnVolver', function () {
	$('#modal').modal('hide');
});

function evaluarColaborador(id){
	$.ajax({
	url: "/evaluarColaborador/"+id,
	type: "GET",
	success: function (datos) {
		$("#datosEvaluacion").html(datos);
		$('#modalEvaluacion').modal('show');
	}

	});
	//alert("asda");
};	
</script>