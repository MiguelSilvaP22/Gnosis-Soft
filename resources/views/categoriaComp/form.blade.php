@extends('admin.layout')

@section ('content')


	<div class='form-group'>
	{!! Form::label('nombre_perfil', 'Nombre:') !!}
	{!! Form::text('name', null, ['class' => 'form-control']) !!}
	</div>
	<div class='form-group'>
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-lg btn-success form-control']) !!}
	</div>

@stop
