
<body> 

		<div class="col-xs-12">
			
			<div class="box">
			
				<div class="box-header">
					<h3 class="box-title">Crear Colaborador</h3>
				</div>

				<div class="box-body">
					<div class="row">
					{!! Form::open(['action' => 'ColaboradorController@store','id'=>'formColaborador']) !!}
						<div class="col-md-6">
							<div class='form-group'>
								{!! Form::label('', 'Nombre:') !!}
								{!! Form::text('nombre_usuario', null, ['class' => 'form-control']) !!}
							</div>
							<div class='form-group'>
								{!! Form::label('', 'run_usuario:') !!}
								{!! Form::text('run_usuario', null, ['class' => 'form-control']) !!}
							</div>
							<div class='form-group'>
								{!! Form::label('', 'apellidopat_usuario:') !!}
								{!! Form::text('apellidopat_usuario', null, ['class' => 'form-control']) !!}
							</div>
							<div class='form-group'>
								{!! Form::label('', 'apellidomat_usuario:') !!}
								{!! Form::text('apellidomat_usuario', null, ['class' => 'form-control']) !!}
							</div>
							<div class='form-group'>
								{!! Form::label('', 'Fecha de Nacimiento:') !!}
								{!! Form::text('fechana_usuario', null, ['class' => 'form-control','id'=>'fechaUsuario']) !!}
							</div>
							<div class='form-group'>
								{!! Form::label('', 'Sexo') !!}
								<div class='radio'>
									<label>
									{!! Form::radio('sexo_usuario', 'F',true); !!} F
									</label>
								</div>
								<div class='radio'>
									<label>
									{!! Form::radio('sexo_usuario', 'M'); !!} M
									</label>
								</div>
							</div>
							<div class='form-group'>
								{!! Form::label('', 'email_usuario:') !!}
								{!! Form::text('email_usuario', null, ['class' => 'form-control']) !!}
							</div>
							<div class='form-group'>
								{!! Form::label('', 'Nacionalidad:') !!}
								{!! Form::select('id_nacionalidad', $nacionalidades,null ,['class' => 'select2','data-placeholder'=>'Seleccione una nacionalidad','id'=>'id_nacionalidad', 'style'=>'width:100%']) !!}
							</div>	
						</div>
						<div class="col-md-6">
							<div class='form-group'>
								{!! Form::label('', 'Empresas:') !!}
								{!! Form::select('id_empresa', $empresas,null ,['class' => 'select2','data-placeholder'=>'Seleccione una empresa','id'=>'id_empresa', 'style'=>'width:100%']) !!}
							</div>	
							<div class='form-group' style="display:none;" id="gerencia">
							</div>	
							<div class='form-group' style="display:none;" id="area">
							</div>	
							<div class='form-group' style="display:none;" id="perfilOcupacional">
							</div>	
						</div>
						
						<div class='form-group'>
							{!! Form::submit("Agregar Colaborador", ['class' => 'form-control btn btn-success ']) !!}
						</div>
						<div class='form-group'>
							<a href='{{ url()->previous() }}' class="form-control btn btn-success " > Volver </a>
						</div>
	  				{!! Form::close() !!}
	  				</div>
				</div>
			</div>
		</div>

</body>

<script type="text/javascript">
	$(document).ready(function() {
		$('#id_empresa').select2({
		});
		$('#id_nacionalidad').select2({
		});
		$('#fechaUsuario').datepicker("option", "dateFormat", 'dd/mm/yy');
	});
	$(document).on('change', '#id_empresa', function () {
	
	$.ajax({
		url: "/selectGerencia/"+this.value,
		type: "GET",
		success: function (datos) {
			$("#gerencia").show();
			$("#gerencia").html(datos);
			$('#select_gerencia').select2();
		}
		});
	});	
	$(document).on('change', '#select_gerencia', function () {
		$.ajax({
		url: "/selectArea/"+this.value,
		type: "GET",
		success: function (datos) {
			$("#area").show();
			$("#area").html(datos);
			$('#select_area').select2();			
		}

		});
	});	
	$(document).on('change', '#select_area', function () {
		$.ajax({
		url: "/selectPerfilOcupacional/"+this.value,
		type: "GET",
		success: function (datos) {
			$("#perfilOcupacional").show();
			$("#perfilOcupacional").html(datos);
			$('#select_perfilOcupacional').select2();			
		}

		});
	});	

	/*$('#formColaborador').submit(function (e) {
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