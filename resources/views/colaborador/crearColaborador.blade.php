
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
								{!! Form::label('', 'RUN:') !!}
								{!! Form::text('run_usuario', null, ['class' => 'form-control','id'=>'run_usuario','maxlength'=>'10']) !!}
								{!! Form::label('', '',['id' => 'errRunUsuario']) !!}
							</div>
							<div class='form-group'>
								{!! Form::label('', 'Nombre:') !!}
								{!! Form::text('nombre_usuario', null, ['class' => 'form-control','id'=>'nombre_usuario','maxlength'=>'500']) !!}
								{!! Form::label('', '',['id' => 'errNombreUsuario']) !!}
							</div>
							
							<div class='form-group'>
								{!! Form::label('', 'Apellido Paterno:') !!}
								{!! Form::text('apellidopat_usuario', null, ['class' => 'form-control','id'=>'apellidopat_usuario','maxlength'=>'500']) !!}
								{!! Form::label('', '',['id' => 'errApellidoP']) !!}
							</div>
							<div class='form-group'>
								{!! Form::label('', 'Apellido Materno:') !!}
								{!! Form::text('apellidomat_usuario', null, ['class' => 'form-control','id'=>'apellidomat_usuario','maxlength'=>'500']) !!}
								{!! Form::label('', '',['id' => 'errApellidoM']) !!}
							</div>
							<div class='form-group'>
								{!! Form::label('', 'Fecha de Nacimiento:') !!}
								{!! Form::text('fechana_usuario', null, ['class' => 'form-control','id'=>'fechaUsuario','placeholder'=>'DD/MM/YY']) !!}
								{!! Form::label('', '',['id' => 'errFechaUsuario']) !!}
							</div>
							<div class='form-group'>
								{!! Form::label('', 'Sexo') !!}
								<div class='radio'>
									<label>
									{!! Form::radio('sexo_usuario', 'F'); !!} F
									</label>
								</div>
								<div class='radio'>
									<label>
									{!! Form::radio('sexo_usuario', 'M'); !!} M
									</label>
								</div>
								{!! Form::label('', '',['id' => 'errSexo']) !!}
							</div>
							<div class='form-group'>
								{!! Form::label('', 'Email:') !!}
								{!! Form::email('email_usuario', null, ['class' => 'form-control','id'=>'email_usuario','maxlength'=>'500']) !!}
								{!! Form::label('', '',['id' => 'errEmail']) !!}
							</div>
							<div class='form-group'>
								{!! Form::label('', 'Nacionalidad:') !!}
								{!! Form::select('id_nacionalidad', $nacionalidades,null ,['class' => 'select2','placeholder'=>'Seleccione una nacionalidad','id'=>'id_nacionalidad', 'style'=>'width:100%']) !!}
								{!! Form::label('', '',['id' => 'errNacionalidad']) !!}
							</div>	
						</div>
						<div class="col-md-6">
							<div class='form-group'>
								{!! Form::label('', 'Empresas:') !!}
								{!! Form::select('id_empresa', $empresas,null ,['class' => 'select2','placeholder'=>'Seleccione una empresa','id'=>'id_empresa', 'style'=>'width:100%']) !!}
								{!! Form::label('', '',['id' => 'errEmpresaUsuario']) !!}
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

			$("#area").hide();
			$("#perfilOcupacional").hide();
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
			
			$("#perfilOcupacional").hide();
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

	$('#formColaborador').submit(function (e) {
	e.preventDefault();
	var url = e.target.action  // get the target
	var formData = $(this).serialize() // get form data
	var tipo = '1';
	if(validarColaborador(tipo))
	{
		$.post(url, formData, function (response) { // send; response.data will be what is returned
			$('#modal').modal('hide');
		});
	}
	});
$(document).on('click', '#btnVolver', function () {
		$('#modal').modal('hide');
});
</script>