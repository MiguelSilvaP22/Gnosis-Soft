
<body> 
  <div class="row">
		<div class="col-xs-12">
			
			<div class="box">
			
				<div class="box-header">
					<h3 class="box-title">Crear Empresa</h3>
				</div>

				<div class="box-body">
					{!! Form::open(['action' => 'EmpresaController@store', 'id'=>'formEmpresa']) !!}
				<div class='form-group'>
					{!! Form::label('nombre_empresa', 'Nombre:') !!}
					{!! Form::text('nombre_empresa', null, ['class' => 'form-control','id'=>'nombre_empresa','maxlength'=>'100']) !!}
					{!! Form::label('', '',['id' => 'errNombreEmpresa']) !!}
				</div>
				<div class='form-group'>
					{!! Form::label('razon_social_empresa', 'Razon Social:') !!}
					{!! Form::text('razon_social_empresa', null, ['class' => 'form-control','id'=>'razon_social_empresa','maxlength'=>'100']) !!}
					{!! Form::label('', '',['id' => 'errRazonSocial']) !!}
				</div>

				<div class='form-group'>
					{!! Form::label('rut_matriz_empresa', 'Rut Matriz:') !!}
					{!! Form::text('rut_matriz_empresa', null, ['class' => 'form-control','id'=>'rut_matriz_empresa','maxlength'=>'10']) !!}
					{!! Form::label('', '',['id' => 'errRutMatriz']) !!}
				</div>

				<div class='form-group'>
					{!! Form::label('giro_empresa', 'Giro:') !!}
					{!! Form::select('id_giro[]', $giros,null ,['class' => 'select2','multiple','id'=>'id_giro', 'style'=>'width:100%']) !!}
					{!! Form::label('', '',['id' => 'errSelectGiro']) !!}
				</div>

				<div class='form-group'>
					{!! Form::label('region_empresa', 'Region:') !!}
					{!! Form::select('id_region', $regiones,null ,['class' => 'select2','placeholder'=>'Seleccione una región','id'=>'id_region', 'style'=>'width:100%']) !!}
					{!! Form::label('', '',['id' => 'errSelectRegion']) !!}
				</div>	

				<div class='form-group' id="comuna" style="display:none">
					{!! Form::label('comuna_empresa', 'Comuna:') !!}
					{!! Form::select('id_comuna', $comunas,null ,['class' => 'form-control select2','placeholder'=>'Seleccione una comuna', 'style'=>'width:100%', 'id'=>'idComuna']) !!}	
					{!! Form::label('', '',['id' => 'errSelectComuna']) !!}				
				</div>				

				<div class='form-group'>
					{!! Form::label('direccion_empresa', 'Dirección:') !!}
					{!! Form::text('direccion_empresa', null, ['class' => 'form-control','id'=>'direccion_empresa','maxlength'=>'100']) !!}
					{!! Form::label('', '',['id' => 'errDirrecionEmpresa']) !!}
				</div>

				<div class='form-group'>
					{!! Form::label('email_empresa', 'Email:') !!}
					{!! Form::email('email_empresa', null, ['class' => 'form-control','id'=>'email_empresa']) !!}
					{!! Form::label('', '',['id' => 'errEmailEmpresa']) !!}
				</div>
				<div class='form-group'>
					{!! Form::label('', 'Tipo de Empresa:') !!}
					<div class='radio'>
						<label>
						{!! Form::radio('tipo_empresa', '0',true); !!} Empresa
						</label>
					</div>
					<div class='radio'>
						<label>
						{!! Form::radio('tipo_empresa', '1'); !!} Holding
						</label>
					</div>
				</div>

				<div id='empresas' class='form-group' style="display:none;">
					{!! Form::label('giro_empresa', 'Empresas del Holding:') !!}
					{!! Form::select('id_empresa[]', $empresas,null ,['class' => 'select2','multiple', 'id'=>'id_empresa', 'style'=>'width:100%']) !!}
					{!! Form::label('', '',['id' => 'errSelectEmpresaHolding']) !!}
				</div>
				<div class='form-group'>
					{!! Form::submit("Agregar empresa", ['class' => 'form-control btn btn-success ']) !!}
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

$('#formEmpresa').submit(function (e) {
	e.preventDefault();
	var url = e.target.action  // get the target
	var formData = $(this).serialize() // get form data
	var tipo = '1';
	if(validarEmpresa(tipo))	
	{
		$.post(url, formData, function (response) { // send; response.data will be what is returned

			$('#modal').modal('hide');
			location.href = '/empresa';
		});
	}

});

$(document).on('change', '#id_region', function () {

	$.ajax({
	url: "/verComuna/"+this.value,
	type: "GET",
	success: function (datos) {
			$("#comuna").show();
			$("#comuna").html(datos);
		}
	});
//alert("asda");
});	

$(document).on('change', "input[name='tipo_empresa']", function () {
		
	if(this.value == 1)
	{
		$("#empresas").show();
	}else
	{
		$("#id_empresa").val(null).trigger("change"); //Eliminar las empresas de holding luego de cambiar a tipo empresa.
		$("#empresas").hide();
	}
	//alert("asda");
});

$(document).on('click', '#btnVolver', function () {
$('#modal').modal('hide');
});
</script>