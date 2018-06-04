
{!! Form::label('comuna_empresa', 'Comuna:') !!}
<<<<<<< HEAD
{!! Form::select('id_comuna', $comunas,null ,['class' => 'form-control select2', 'placeholder'=>'Seleccione una comuna','id'=>'idComuna','style'=>'width:100%']) !!}

=======
{!! Form::select('id_comuna', $comunas,null ,['class' => 'form-control select2','placeholder'=>'Seleccione una comuna', 'id'=>'idComuna','style'=>'width:100%']) !!}
{!! Form::label('', '',['id' => 'errSelectComuna']) !!}
>>>>>>> 4412927d48908299ff1431d806f57c41c308c7a2
<script>
	$(document).ready(function() {
		$('#idComuna').select2();
	});

</script>
