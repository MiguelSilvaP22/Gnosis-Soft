<body> 
  <div class="row">
		<div class="col-xs-12">
			
			<div class="box">
			
				<div class="box-header">
					<h3 class="box-title">Crear Gerencia</h3>
				</div>
				<div class="box-body">
					{!! Form::open(['action' => 'GerenciaController@store','id'=>'formGerencia']) !!}
				<div class='form-group'>
					{!! Form::label('', 'Nombre:') !!}
					{!! Form::text('nombre_gerencia', null, ['class' => 'form-control','id'=>'nombre_gerencia']) !!}
					{!! Form::label('', '',['id' => 'errNombreGerencia']) !!}
				</div>
				<div class='form-group'>
					{!! Form::hidden('id_empresa',$idEmpresa, ['class' => 'form-control']) !!}
				</div>
				<div class='form-group'>
					{!! Form::submit("Agregar Gerencia", ['class' => 'form-control btn btn-success ']) !!}
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
function marcarErrorGeneral(id,idErr){
	document.getElementById(id).style.background='#FFEEEE'; document.getElementById(id).style.borderColor='#FF3333'; 
	document.getElementById(idErr).innerHTML='Campo Obligatorio';
	document.getElementById(idErr).style.color = '#FF3333';

}
function desmarcarErrorGeneral(id,idErr){
	document.getElementById(id).style.background="";
	document.getElementById(id).style.borderColor="";
	document.getElementById(idErr).innerHTML='';
}

$('#formGerencia').submit(function (e) {
var verifica=true;
e.preventDefault();
var url = e.target.action  // get the target
var formData = $(this).serialize() // get form data
if($("#nombre_gerencia").val() == "" ){verifica = false; marcarErrorGeneral('nombre_gerencia','errNombreGerencia');}else{desmarcarErrorGeneral('nombre_gerencia','errNombreGerencia');}
if(verifica)	
{
	$.post(url, formData, function (response) { // send; response.data will be what is returned
	$('#modal').modal('hide');
	refrescarGerencia({{$idEmpresa}});
	});
}
});

	
</script>
