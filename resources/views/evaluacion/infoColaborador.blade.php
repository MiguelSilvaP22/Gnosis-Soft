<div class="row">
	<div class="col-md-5">
		<h4>Datos Colaborador</h4>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class='form-group'>
			{!! Form::label('', 'Nombre Colaborador:') !!}
			{!! Form::text('nombre_usuario', $colaborador->nombre_usuario, ['class' => 'form-control','id'=>'nombre_usuario','disabled'=>'disabled']) !!}
		</div>
	</div>
	<div class="col-md-6">
	<div class='form-group'>
			{!! Form::label('', 'Apellido Colaborador:') !!}
			{!! Form::text('nombre_usuario', $colaborador->apellidopat_usuario, ['class' => 'form-control','id'=>'nombre_usuario','disabled'=>'disabled']) !!}
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<div class='form-group'>
			{!! Form::label('', 'Perfil Ocupacional:') !!}
			{!! Form::text('nombre_usuario', $perfilOcupacional->nombre_perfilocu, ['class' => 'form-control','id'=>'nombre_usuario','disabled'=>'disabled']) !!}
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<div class='form-group'>
			{!! Form::label('', 'Competencia a evaluar:') !!}
			{!! Form::select('competencias', $listaCompetencias,null,['class'=>'form-control', 'id'=>'listaCompetencias', 'placeholder'=>'Seleccione una competencia', 'style'=>'width:100%']) !!}
		</div>
	</div>
</div>


