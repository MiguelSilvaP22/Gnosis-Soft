
<body> 
	<div class="col-xs-12">
		<div class="box">
			<div class="box-body">
				<div class="row">
				{!! Form::open(['action' => 'EvaluacionController@store','id'=>'formEvaluacion']) !!}
				<div class='form-group'  id="datosColaborador">
				</div>
				<div class='form-group'>
					{!! Form::submit("Agregar Evaluación", ['class' => 'form-control btn btn-success ']) !!}
				</div>

				{!! Form::close() !!}
				<div class='form-group'>
					<div id="btnVolver" class="form-control btn btn-success " > Volver </div>
				</div>
			</div>
			
		</div>
	</div>
</body>

<script type="text/javascript">
	$(document).ready(function() {
	$.ajax({
			url: "/infoColaborador/"+{{$colaborador->id_usuario}},
			type: "GET",
			success: function (datos) {
				$("#datosColaborador").html(datos);		
			}
			});
	});



</script>