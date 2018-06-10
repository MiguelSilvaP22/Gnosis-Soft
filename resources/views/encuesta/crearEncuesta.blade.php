
<body> 
	<div class="row">
	{!! Form::open(['action' => 'EncuestaController@store', 'id'=>'formEncuesta']) !!}
		<div class="col-xs-12">	
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Crear Encuesta</h3>
				</div>
				<div class="box-body">
				
					<div class="row">
						<div class="col-md-12">
						
						<div id='tiposEncuesta1' class='form-group' >
							{!! Form::label('', 'Tipo de Encuesta:') !!}
							<div class="input-group">	
								{!! Form::select('id_tipoEncuesta', $tiposEncuesta,null ,['class' => 'select2','onChange'=>'cargarSelectCategoriaPreguntas(this.value)','placeholder'=>'Seleccione un Tipo', 'id'=>'id_tipoEncuesta', 'style'=>'width:100%']) !!}
								<span type="button" class="input-group-addon" aria-label="Left Align" onclick="addTipoEncuesta()" id="btnAddTipoEncuesta"> <i class="fa fa-plus"></i> </span>
							</div>
						</div>
						<div id='nuevoTipoEncuesta' class='form-group' >

						</div>
						</div>
					</div>
				</div>	
			</div>
		</div>

		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Preguntas</h3>
				</div>

				<div class="box-body">
					<div class="row">
						<div class="col-md-12">
							<div id='categoriaPreguntas' class='form-group' >

							</div>
							<div id='nuevoCategoriaPreguntas' class='form-group' >

							</div>
								<div id="tablaAdd" style="display:none;"> 
									<table id="tableAddPreguntas" style="width:100%;">
										<tbody>
										<tr id="form0">
											<td>
											<div  class='form-group' >
												{!! Form::label('', ' Pregunta 1') !!}
													<div class="input-group">	
													{!! Form::text('nombre_pregunta[]', null, ['class' => 'form-control date','id'=>'nombre_pregunta']) !!}
													<span type="button" class="input-group-addon" onClick="cargarFormPreguntas();"aria-label="Left Align"> <i class="fa fa-remove"></i> </span>
													</div>
												</div>
												<div class='form-group'>
													{!! Form::radio('alternativa[0]', '1'); !!} Satisfacción
													{!! Form::radio('alternativa[0]', '2'); !!} Escala de Notas	
													{!! Form::radio('alternativa[0]', '3'); !!} Si / No	
													{!! Form::radio('alternativa[0]', '4'); !!} Opinion
												</div>
											</td>
										</tr>	
										</tbody>
									</table>	
								</div>	
						</div>
					</div>
				</div>	
			</div>
		</div>	
		<div class='form-group'>
			{!! Form::submit("Agregar Encuesta", ['class' => 'form-control btn btn-success ']) !!}
		</div>
		{!! Form::close() !!}
		<div class='form-group'>
			<div id="btnVolver" class="form-control btn btn-success " > Volver </div>
		</div>
		
	</div>

</body>

<script>
var count =0;
$(document).ready(function() {
	$('.select2').select2();
	
});

function addTipoEncuesta() {
	$('#nuevoTipoEncuesta').html(
		'<label for="">Nombre Tipo Encuesta:</label>'+
		"<div class='input-group'>"+
		'<input class="form-control" name="nombre_tipoEncuesta" id="nombre_tipoEncuesta" type="text">'+
			"<span type='button' class='input-group-addon' aria-label='Left Align' onclick='guardarTipoEncuesta()' id='btnGuardarTipoEncuesta'> <i class='fa fa-check'></i> </span>"+
		"</div>	"		
		);
};

	
function guardarTipoEncuesta() {
	$.ajax({
	url: "/crearTipoEncuesta/"+$('#nombre_tipoEncuesta').val(),
	type: "GET",
	success: function (datos) {
		$('#tiposEncuesta1').html(datos);
		$('#id_tipoEmpresa').select2();
		$('#nuevoTipoEncuesta').html('');
	}
	});	
};
function cargarSelectCategoriaPreguntas(id) {
	$.ajax({
	url: "/selectCategoriaPreguntas/"+id,
	type: "GET",
	success: function (datos) {
		$('#categoriaPreguntas').html(datos);
		$('#tablaAdd').show();
		$('#id_categoriaPregunta').select2();
	}
	});	
};

function addCategoriaPreguntas() {
	$('#nuevoCategoriaPreguntas').html(
		'<label for="">Nombre Categoria Pregunta:</label>'+
		"<div class='input-group'>"+
		'<input class="form-control" name="nombre_categoria" id="nombre_categoria" type="text">'+
			"<span type='button' class='input-group-addon' aria-label='Left Align' onclick='guardarCategoriaPreguntas()' id='btnGuardarCategoriaPreguntas'> <i class='fa fa-check'></i> </span>"+
		"</div>	"		
	);
};
function guardarCategoriaPreguntas() {
	$.ajax({
	url: "/crearCategoriaPreguntas/"+$('#nombre_categoria').val(),
	type: "GET",
	success: function (datos) {
		$('#categoriaPreguntas').html(datos);
		$('#id_categoriaPregunta').select2();
		$('#nuevoCategoriaPreguntas').html('');
	}
	});	
};


function cargarFormPreguntas() {
	count++;
		$.ajax({
		url: "/formPreguntas/"+count,
		type: "GET",
		success: function (datos) {
			$('#tableAddPreguntas tr:last').after(datos);
		}
		});
}


/*$('#formEncuesta').submit(function (e) {
	e.preventDefault();
	var url = e.target.action  // get the target
	var formData = $(this).serialize() // get form data
	$.post(url, formData, function (response) { // send; response.data will be what is returned
		
	});
	

});*/

$(document).on('click', '#btnVolver', function () {
	$('#modal').modal('hide');
});
</script>