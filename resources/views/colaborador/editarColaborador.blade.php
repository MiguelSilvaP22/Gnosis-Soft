
<body> 
  <div class="row">
		<div class="col-xs-12">
			
			<div class="box">
			
				<div class="box-header">
					<h3 class="box-title">Editar Colaborador </h3>
				</div>

				<div class="box-body">
					<div class="row">
						
					{!! Form::model($colaborador, ['method' => 'PATCH', 'action' => ['ColaboradorController@update',$colaborador->id_usuario]]) !!}
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
								{!! Form::text('fechana_usuario', date('d/m/Y',strtotime($colaborador->fechana_usuario)), ['class' => 'form-control','id'=>'fechaUsuario']) !!}
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
							<div class='form-group'>
								{!! Form::label('', 'Empresas:') !!}
								{!! Form::select('id_empresa', $empresas,$colaborador->perfilOcupacional->area->gerencia->empresa->id_empresa ,['class' => 'select2','id'=>'id_empresa', 'style'=>'width:100%']) !!}
							</div>	
							<div class='form-group' id="gerencia">
								{!! Form::label('', 'Gerencia:') !!}
								{!! Form::select('id_gerencia', $gerencias,$colaborador->perfilOcupacional->area->gerencia->id_gerencia ,['class' => 'select2','id'=>'select_gerencia', 'style'=>'width:100%']) !!}
							</div>
							<div class='form-group' id="area">
								{!! Form::label('', 'Area:') !!}
								{!! Form::select('id_area', $areas,$colaborador->perfilOcupacional->area->id_area ,['class' => 'select2','id'=>'select_area', 'style'=>'width:100%']) !!}
							</div>
							<div class='form-group' id="perfilOcupacional">
								{!! Form::label('', 'Perfil Ocupacional:') !!}
								{!! Form::select('id_perfilocu', $perfilesOcu,$colaborador->perfilOcupacional->id_perfilocu ,['class' => 'select2','id'=>'select_perfilOcupacional', 'style'=>'width:100%']) !!}
							</div>
						</div>
						{!! Form::hidden('cargarSelects','1',['id'=>'cargarSelects']) !!}
						<div class='form-group'>
							{!! Form::submit("Editar Colaborador", ['class' => 'form-control btn btn-success ']) !!}
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



</script>
