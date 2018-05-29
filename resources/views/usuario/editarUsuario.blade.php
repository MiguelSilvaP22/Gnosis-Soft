
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
							{!! Form::label('', 'Perfil:') !!}
							{!! Form::select('id_perfil', $perfiles,null ,['class' => 'select2','data-placeholder'=>'Seleccione un Perfil','id'=>'id_perfil', 'style'=>'width:100%']) !!}
							<div id="empresas" style="display:none;">
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
	if($("#id_perfil").val() == 2 || $("#id_perfil").val() == 3)
	{
		var idEmpresa = {{$usuario->perfilOcupacional->area->gerencia->empresa->id_empresa}};
	}
	else
	{
		var idEmpresa = null;
	}
	
    $('.select2').select2();
    if(idEmpresa != null)
    {
    	$('#id_empresa').select2().val(idEmpresa).trigger("change");
    	$("#empresas").show();
    }
});
$(document).on('change', '#id_perfil', function () {
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
	var idGerencia = {{$usuario->perfilOcupacional->area->gerencia->id_gerencia}};
	$.ajax({
		url: "/selectGerencia/"+this.value,
		type: "GET",
		success: function (datos) {
			$("#gerencia").show();
			$("#gerencia").html(datos);
			if($("#cargarSelects").val() == 1 && idGerencia != null)
			{
				$('#select_gerencia').select2().val(idGerencia).trigger("change");
			}
			else
			{
				$('#select_gerencia').select2();
				$("#area").hide();
				$("#perfilOcupacional").hide();
			}
			
		}
		});
	});	
	$(document).on('change', '#select_gerencia', function () {
		var idArea = {{$usuario->perfilOcupacional->area->id_area}};
		$.ajax({
		url: "/selectArea/"+this.value,
		type: "GET",
		success: function (datos) {
			$("#area").show();
			$("#area").html(datos);
			if($("#cargarSelects").val() == 1 && idArea != null)
			{
				$('#select_area').select2().val(idArea).trigger("change");	
			}
			else
			{
				$('#select_area').select2();
				$("#perfilOcupacional").hide();
			}
					
		}

		});
	});	
	$(document).on('change', '#select_area', function () {
		var idPerfilOcupacional = {{$usuario->id_perfilocu}};
		$.ajax({
		url: "/selectPerfilOcupacional/"+this.value,
		type: "GET",
		success: function (datos) {
			$("#perfilOcupacional").show();
			$("#perfilOcupacional").html(datos);
			if($("#cargarSelects").val() == 1 && idPerfilOcupacional != null)
			{
				$('#select_perfilOcupacional').select2().val(idPerfilOcupacional).trigger("change");
				$("#cargarSelects").val('0');
			}
			else
			{
				$('#select_perfilOcupacional').select2();
			}
				
		}

		});
	});	



</script>
