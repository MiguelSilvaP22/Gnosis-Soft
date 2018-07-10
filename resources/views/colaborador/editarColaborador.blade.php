
<body> 
  <div class="row">
		<div class="col-xs-12">
			
			<div class="box">
			
				<div class="box-header">
					<h3 class="box-title">Editar Colaborador </h3>
				</div>

				<div class="box-body">
					<div class="row">
						
					{!! Form::model($colaborador, ['method' => 'PATCH', 'action' => ['ColaboradorController@update',$colaborador->id_usuario],'id'=>'formColaborador']) !!}
						<div class="col-md-6">
							<div class='form-group'>
								{!! Form::label('', 'Nombre:') !!}
								{!! Form::text('nombre_usuario', null, ['class' => 'form-control','id'=>'nombre_usuario','maxlength'=>'500']) !!}
								{!! Form::label('', '',['id' => 'errNombreUsuario']) !!}
							</div>
							<div class='form-group'>
								{!! Form::label('', 'RUN Usuario:') !!}
								{!! Form::text('run_usuario', null, ['class' => 'form-control','id'=>'run_usuario','maxlength'=>'10','readonly' => true]) !!}
								{!! Form::label('', '',['id' => 'errRunUsuario']) !!}
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
								{!! Form::text('fechana_usuario', date('d/m/Y',strtotime($colaborador->fechana_usuario)), ['class' => 'form-control','id'=>'fechaUsuario','placeholder'=>'DD/MM/YY']) !!}
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
								{!! Form::label('', 'E-mail:') !!}
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
								{!! Form::select('id_empresa', $empresas,$colaborador->perfilOcupacional->area->gerencia->empresa->id_empresa ,['class' => 'select2','id'=>'id_empresa', 'style'=>'width:100%']) !!}
								{!! Form::label('', '',['id' => 'errEmpresaUsuario']) !!}
							</div>	
							<div class='form-group' id="gerencia">
								{!! Form::label('', 'Gerencia:') !!}
								{!! Form::select('id_gerencia', $gerencias,$colaborador->perfilOcupacional->area->gerencia->id_gerencia ,['class' => 'select2','id'=>'select_gerencia', 'style'=>'width:100%']) !!}
								{!! Form::label('', '',['id' => 'errGerenciaUsuario']) !!}	
							</div>
							<div class='form-group' id="area">
								{!! Form::label('', 'Area:') !!}
								{!! Form::select('id_area', $areas,$colaborador->perfilOcupacional->area->id_area ,['class' => 'select2','id'=>'select_area', 'style'=>'width:100%']) !!}
								{!! Form::label('', '',['id' => 'errAreaUsuario']) !!}
							</div>
							<div class='form-group' id="perfilOcupacional">
								{!! Form::label('', 'Perfil Ocupacional:') !!}
								{!! Form::select('id_perfilocu', $perfilesOcu,$colaborador->perfilOcupacional->id_perfilocu ,['class' => 'select2','id'=>'select_perfilOcupacional', 'style'=>'width:100%']) !!}
								{!! Form::label('', '',['id' => 'errPerfilOcupacionalUsuario']) !!}
							</div>
						</div>
						{!! Form::hidden('cargarSelects','1',['id'=>'cargarSelects']) !!}
						<div class='form-group'>
							{!! Form::submit("Editar Colaborador", ['class' => 'form-control btn btn-success ']) !!}
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

<script>

$(document).ready(function() {
    $('.select2').select2();
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
	var tipo = '2';
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
