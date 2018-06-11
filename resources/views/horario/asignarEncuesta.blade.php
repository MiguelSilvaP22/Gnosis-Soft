
<body> 

		<div class="col-xs-12">
			
			<div class="box">
			
				<div class="box-header">
					<h3 class="box-title">Asignar Encuesta</h3>
				</div>

				<div class="box-body">
					<div class="row">
					{!! Form::open(['action' => 'HorarioController@storeAsignacionEncuesta','id'=>'formAsignacionEncuesta']) !!}
						<div class="col-md-12   ">
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

<script type="text/javascript">
	$(document).ready(function() {
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