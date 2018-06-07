
<body> 
  <div class="row">
		<div class="col-xs-12">
			
			<div class="box">
			
				<div class="box-header">
					<h3 class="box-title">Editar Usuario </h3>
				</div>

				<div class="box-body">
					<div class="row">
						
					{!! Form::model($usuario, ['method' => 'PATCH', 'action' => ['UsuarioController@update',$usuario->id_usuario]]) !!}
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
								{!! Form::text('fechana_usuario', date('d/m/Y',strtotime($usuario->fechana_usuario)), ['class' => 'form-control','id'=>'fechaUsuario']) !!}
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
								{!! Form::select('id_nacionalidad', $nacionalidades,null ,['class' => 'select2','placeholder'=>'Seleccione una nacionalidad','id'=>'id_nacionalidad', 'style'=>'width:100%']) !!}
							</div>	
						</div>
						<div class="col-md-6">
							{!! Form::label('', 'Perfil:') !!}
							{!! Form::select('id_perfil', $perfiles,null ,['class' => 'select2','placeholder'=>'Seleccione un Perfil','id'=>'id_perfil', 'style'=>'width:100%']) !!}

							@if($usuario->id_perfil == 2 || $usuario->id_perfil == 3)
							<div id="empresas">
								<div class='form-group'>
									{!! Form::label('', 'Empresas:') !!}
									{!! Form::select('id_empresa', $empresas,$usuColabEmpre->id_empresa ,['class' => 'select2','placeholder'=>'Seleccione una Empresa','id'=>'id_empresa', 'style'=>'width:100%']) !!}
								</div>	
								<div class='form-group' id="gerencia">
									{!! Form::label('', 'Gerencia:') !!}
									{!! Form::select('id_gerencia', $gerencias,$usuColabEmpre->id_gerencia ,['class' => 'select2','placeholder'=>'Seleccione una Gerencia','id'=>'select_gerencia', 'style'=>'width:100%']) !!}
								</div>
								<div class='form-group' id="area">
									{!! Form::label('', 'Area:') !!}
									{!! Form::select('id_area', $areas,$usuColabEmpre->id_area ,['class' => 'select2','id'=>'select_area','placeholder'=>'Seleccione un Area', 'style'=>'width:100%']) !!}
								</div>
								<div class='form-group' id="perfilOcupacional">
									{!! Form::label('', 'Perfil Ocupacional:') !!}
									{!! Form::select('id_perfilocu', $perfilesOcu,$usuColabEmpre->id_perfilocu ,['class' => 'select2','placeholder'=>'Seleccione Perfil Ocupacional','id'=>'select_perfilOcupacional', 'style'=>'width:100%']) !!}
								</div>
							</div>
							@endif
							
						</div>
						{!! Form::hidden('cargarSelects','1',['id'=>'cargarSelects']) !!}
						<div class='form-group'>
							{!! Form::submit("Editar Usuario", ['class' => 'form-control btn btn-success ']) !!}
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

<script>

$(document).ready(function() {
    $('.select2').select2();
});
$(document).on('change', '#id_perfil', function () {
	$("#gerencia").hide();
	$("#area").hide();
	$("#perfilOcupacional").hide();
	if(this.value == 2 || this.value == 3)
	{
		$("#empresas").show();
	}
	else
	{
		$("#empresas").hide();

	}
	$('#id_empresa').select2().val('').trigger("change");
	$('#select_gerencia').select2().val('').trigger("change");
	$('#select_area').select2().val('').trigger("change");
	$('#select_perfilOcupacional').select2().val('').trigger("change");
	
});		
	$(document).on('change', '#id_empresa', function () {
	if(this.value!= "")
	{
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
	}
	
	});	
	$(document).on('change', '#select_gerencia', function () {
	if(this.value!= "")
	{
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
	}
	});	
	$(document).on('change', '#select_area', function () {
	if(this.value!= "")
	{
		$.ajax({
		url: "/selectPerfilOcupacional/"+this.value,
		type: "GET",
		success: function (datos) {
			$("#perfilOcupacional").show();
			$("#perfilOcupacional").html(datos);
			$('#select_perfilOcupacional').select2();					
		}

		});
	}
	});	



</script>
