
<body> 
	<div class="row">
	{!! Form::model($encuesta, ['method' => 'PATCH', 'action' => ['EncuestaController@update',$encuesta->id_encuesta],'id'=>'formEncuesta']) !!}
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
								{!! Form::select('id_tipoEncuesta', $tiposEncuesta,$encuesta->id_tipoencuesta ,['class' => 'select2','placeholder'=>'Seleccione un Tipo', 'id'=>'id_tipoEncuesta', 'style'=>'width:100%']) !!}
								<span type="button" class="input-group-addon" aria-label="Left Align" onclick="addTipoEncuesta()" id="btnAddTipoEncuesta"> <i class="fa fa-plus"></i> </span>
							</div>
						</div>
							<div id='nuevoTipoEncuesta' class='form-group' >

							</div>
							<div class='form-group' >
								{!! Form::label('', 'Observaciones Encuesta:') !!}
								{!! Form::textArea('observacion_enc', null, ['class' => 'form-control','id'=>'observacion_enc']) !!}
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
			{{--<span type="button" class="btn btn-default btn-flat" style="float: right;" aria-label="Left Align" onclick="addColumnaPregunta()" id="btnAddColumnaPregunta"> <i class="fa fa-plus"></i>Nueva Categoria de preguntas </span>--}}
		<div class="col-xs-12" id="columnaPregunta">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Preguntas por Categoria</h3>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-md-12">
							<div id='categoriaPreguntas0' class='form-group' >								
								{!! Form::label('', 'Categoria Preguntas:') !!}
								<div class="input-group">	
									{!! Form::select('id_categoriaPregunta[0]', $categoriasPreguntas,$idCategoria->id_categoria ,['class' => 'select2','placeholder'=>'Seleccione una Categoria', 'id'=>'id_categoriaPregunta0', 'style'=>'width:100%']) !!}
									<span type="button" class="input-group-addon" aria-label="Left Align" onclick="addCategoriaPreguntas(0)" id="btnaddCategoriaPreguntas"> <i class="fa fa-plus"></i> </span>
								</div>
							</div>
							<div id='nuevoCategoriaPreguntas0' class='form-group' >
							</div>
								<div> 
									<table id="tableAddPreguntas0" style="width:100%;">
										<tbody>
										@foreach($encuesta->preguntasEncuesta->where('estado_preguntaencuesta',1)->values() as $key => $preguntaEncuesta)
												
										<tr id="form{{$key}}">
											<td>
											<div  class='form-group' >
												@if($key !=0)
													{!! Form::label('', ' Pregunta '.($key+1).'') !!}
													<div class="input-group">	
													{!! Form::text('nombre_pregunta['.$key.']', $preguntaEncuesta->pregunta->nombre_pregunta, ['class' => 'form-control','id'=>'nombre_pregunta'.$key.'']) !!}
														<span type="button" class="input-group-addon" onClick="eliminarFormPreguntas({{$key}});"aria-label="Left Align"> <i class="fa fa-remove"></i> </span>
													</div>
												@else
													{!! Form::label('', ' Pregunta '.($key+1).'') !!}
													<div class="input-group">	
													{!! Form::text('nombre_pregunta['.$key.']', $preguntaEncuesta->pregunta->nombre_pregunta, ['class' => 'form-control','id'=>'nombre_pregunta'.$key.'']) !!}
														<span type="button" class="input-group-addon" onClick="cargarFormPreguntas({{$key}});"aria-label="Left Align"> <i class="fa fa-plus"></i> </span>
													</div>
												@endif	
												
												</div>
												{{--<div class='form-group'>
													@foreach($tiposAlternativa as $tipoAltv)
														{!! Form::radio("alternativa[0]", $tipoAltv->id_tipoaltv, null) !!} {{$tipoAltv->nombre_tipoaltv}}								
													@endforeach
												</div>--}}
											</div>	
											</td>
										</tr>	
										@endforeach	
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
var count ={{Count($encuesta->preguntasEncuesta->where('estado_preguntaencuesta',1))-1 }};
var countCategorias = 0;
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
	$('#tablaAdd').show();
};

function addCategoriaPreguntas(id) {
	$('#nuevoCategoriaPreguntas'+id).html(
		'<label for="">Nombre Categoria Pregunta:</label>'+
		"<div class='input-group'>"+
		'<input class="form-control" name="nombre_categoria['+id+']" id="nombre_categoria'+id+'" type="text">'+
			"<span type='button' class='input-group-addon' aria-label='Left Align' onclick='guardarCategoriaPreguntas("+id+")' id='btnGuardarCategoriaPreguntas"+id+"'> <i class='fa fa-check'></i> </span>"+
		"</div>	"		
	);
};
function guardarCategoriaPreguntas(id) {
	$.ajax({
	url: "/crearCategoriaPreguntas/"+$('#nombre_categoria'+id).val()+"/id/"+id,
	type: "GET",
	success: function (datos) {
		$('#categoriaPreguntas'+id).html(datos);
		$('#id_categoriaPregunta'+id).select2();
		$('#nuevoCategoriaPreguntas'+id).html('');
	}
	});	
};


function cargarFormPreguntas(id) {
	count++;
		$.ajax({
		url: "/formPreguntas/"+count,
		type: "GET",
		success: function (datos) {
			$('#tableAddPreguntas'+id+' tr:last').after(datos);
		}
		});
}

function addColumnaPregunta() {
	countCategorias++;
	$.ajax({
	url: "/formCategoriaPreguntas/"+countCategorias,
	type: "GET",
	success: function (datos) {
		$('#columnaPregunta').after(datos);
		$('#id_categoriaPregunta').select2();
	}
	});
};
function eliminarColumnaPregunta(id) {

	$('#columnaPregunta'+id).remove();

	
};

function eliminarFormPreguntas(id){
		count--;
		$("#form"+id).remove();		
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