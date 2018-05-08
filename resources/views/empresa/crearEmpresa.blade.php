@extends('admin.layout')

@section ('content')

<body> 
  <div class="row">
		<div class="col-xs-12">
			
			<div class="box">
			
				<div class="box-header">
					<h3 class="box-title">Crear Empresa</h3>
				</div>

				<div class="box-body">
					{!! Form::open(['action' => 'EmpresaController@store']) !!}
				<div class='form-group'>
					{!! Form::label('nombre_empresa', 'Nombre:') !!}
					{!! Form::text('nombre_empresa', null, ['class' => 'form-control']) !!}
				</div>
				<div class='form-group'>
					{!! Form::label('razon_social_empresa', 'Razon Social:') !!}
					{!! Form::text('razon_social_empresa', null, ['class' => 'form-control']) !!}
				</div>

				<div class='form-group'>
					{!! Form::label('rut_matriz_empresa', 'Rut Matriz:') !!}
					{!! Form::text('rut_matriz_empresa', null, ['class' => 'form-control']) !!}
				</div>

				<div class='form-group'>
					{!! Form::label('giro_empresa', 'Giro:') !!}
					{!! Form::select('id_giro[]', $giros,null ,['class' => 'select2','multiple', 'data-placeholder'=>'Seleccione uno o varios giros','id'=>'id_giro', 'style'=>'width:100%']) !!}
				</div>

				<div class='form-group'>
					{!! Form::label('region_empresa', 'Region:') !!}
					{!! Form::select('id_region', $regiones,null ,['class' => 'select2','data-placeholder'=>'Seleccione una región','id'=>'id_region', 'style'=>'width:100%']) !!}
				</div>	

				<div class='form-group' id="comuna">
					
				</div>				

				<div class='form-group'>
					{!! Form::label('direccion_empresa', 'Dirección:') !!}
					{!! Form::text('direccion_empresa', null, ['class' => 'form-control']) !!}
				</div>

				<div class='form-group'>
					{!! Form::label('email_empresa', 'Email:') !!}
					{!! Form::email('email_empresa', null, ['class' => 'form-control']) !!}
				</div>
				<div class='form-group'>
					{!! Form::submit("Agregar empresa", ['class' => 'form-control btn btn-success ']) !!}
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
@stop

@section('script-js')
<script>
$(document).ready(function() {
    $('.select2').select2();
});

$(document).on('change', '#id_region', function () {
		$.ajax({
		url: "/verComuna/"+this.value,
		type: "GET",
		success: function (datos) {
			$("#comuna").html(datos);
		}

		});
		//alert("asda");
});	
</script>
@stop