
<body> 
  <div class="row">
		<div class="col-xs-12">
			
			<div class="box">
			
				<div class="box-header">
					<h3 class="box-title">Crear Area</h3>
				</div>
				<div class="box-body">
					{!! Form::open(['action' => 'AreaController@store','id'=>'formArea']) !!}
				<div class='form-group'>
					{!! Form::label('', 'Nombre:') !!}
					{!! Form::text('nombre_area', null, ['class' => 'form-control','id'=>'nombre_area']) !!}
					{!! Form::label('', '',['id' => 'errNombreArea']) !!}
				</div>
				<div class='form-group'>
					{!! Form::hidden('id_gerencia',$idGerencia, ['class' => 'form-control']) !!}
				</div>
				<div class='form-group'>
					{!! Form::submit("Agregar Area", ['class' => 'form-control btn btn-success ']) !!}
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
$('#formArea').submit(function (e) {
e.preventDefault();
var url = e.target.action  // get the target
var formData = $(this).serialize() // get form data
if(validarArea())	
{
	$.post(url, formData, function (response) { // send; response.data will be what is returned
		$('#modal').modal('hide');
		refrescarArea({{$idGerencia}});
	});
}
});
$(document).on('click', '#btnVolver', function () {
		$('#modal').modal('hide');
});
</script>
