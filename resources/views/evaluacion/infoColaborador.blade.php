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
	<div class="col-md-5">
		<h4>Evaluacion de Colaborador</h4>
	</div>
</div>


<div class="row">
	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
		<div class="panel panel-default">
			@foreach($colaborador->perfilOcupacional->competencias as $key0 => $comp)
			
			<div class="panel-heading" role="tab" id="heading{{$key0}}">
				<h4 class="panel-title">
					<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$key0}}" aria-expanded="false" aria-controls="collapseOne">
				 {{ $comp->nombre_comp }} 
				   </a>
				</h4>
			</div>

			<div id="collapse{{$key0}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{$key0}}">
				<div class="panel-body">
				@foreach($comp->rolDesempenos as $key1 => $roldesempeno)
					{!! Form::label('', $roldesempeno->nombre_roldesempeno) !!}								
								<p>
								@foreach($tiponivel as $key2 => $nivel)
							
								{!! $nivel->nombre_tiponivel !!}	 
								
									@if($roldesempeno->rolEvaluaciones->last()->nivel_rolevaluacion == $key2+1 && $roldesempeno->rolEvaluaciones->last()->evaluacionDNC->id_usuario == $colaborador->id_usuario)
									{!! Form::radio("prueba[$roldesempeno->id_roldesempeno]", $roldesempeno->id_roldesempeno."-".$nivel->id_tiponivel, true) !!} 

									@else
									{!! Form::radio("prueba[$roldesempeno->id_roldesempeno]", $roldesempeno->id_roldesempeno."-".$nivel->id_tiponivel, null) !!} 
									@endif
								@endforeach
								</p>
				@endforeach	
				</div>
			</div>
			@endforeach
			</div>

	</div>
</div>


