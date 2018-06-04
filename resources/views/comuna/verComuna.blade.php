
{!! Form::label('comuna_empresa', 'Comuna:') !!}
{!! Form::select('id_comuna', $comunas,null ,['class' => 'form-control select2', 'placeholder'=>'Seleccione una comuna','id'=>'idComuna','style'=>'width:100%']) !!}

<script>
	$(document).ready(function() {
		$('#idComuna').select2();
	});

</script>
