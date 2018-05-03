@extends('admin.layout')

@section ('content')

<body> 
  <div class="row">
		<div class="col-xs-12">
			
			<div class="box">
			
				<div class="box-header">
					<h3 class="box-title">Crear Perfil</h3>
				</div>

				<div class="box-body">
				{!! Form::open(['action' => 'PerfilController@store']) !!}
				<div class='form-group'>
				{!! Form::label('nombre_perfil', 'Nombre:') !!}
				{!! Form::text('nombre_perfil', null, ['class' => 'form-control']) !!}
				</div>
				<div class='form-group'>
				{!! Form::submit("Agregar Perfil", ['class' => 'btn btn-lg btn-success form-control']) !!}
				</div>
				<div class='form-group'>
				<a href='{{ url()->previous() }}' class="btn btn-lg btn-success form-control" > Volver </a>
				</div>
  				{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>

</body>
@stop
