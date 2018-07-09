<div class="row">

	<div class="col-xs-12">
	{!! Form::open(['action' => 'EvaluacionController@store','id'=>'formEvaluacion']) !!}
		<div class="box">
			<div class="box-header">
				<h1 class="box-title">Datos Colaborador</h1>

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
		<h4>Evaluación de Colaborador</h4>
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
			<div class="box-body">
				<div class="col-xs-12">
				
					<div class="table-responsive">	
						<table class="table">
							<thead>
								<tr>
									<th>Nombre</th>
									<th>Perfil Ocupacional</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>{{$colaborador->nombre_usuario." ".$colaborador->apellidopat_usuario}}</td>
									<td> {{$perfilOcupacional->nombre_perfilocu}}</td>
								</tr>
							</tbody>

						</table>
					</div>
				</div>
			</div>
		</div>	
				<div class="box">
					<div class="box-header">
						<h1 class="box-title">Evaluacion de Colaborador</h1>
					</div>
					<div class="box-body">
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
											@if(($roldesempeno->rolEvaluaciones->count()>0) && ($roldesempeno->rolEvaluaciones->last()->nivel_rolevaluacion == $key2+1 && $roldesempeno->rolEvaluaciones->last()->evaluacionDNC->id_usuario == $colaborador->id_usuario))
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
						<div class='form-group'>
							{!! Form::label('', 'Observacion:') !!}
							@if(Count($colaborador->evaluacionDNC) > 0)
								{!! Form::textArea('observacion', $colaborador->evaluacionDNC->last()->observacion, ['class' => 'form-control',"rows"=>"4"]) !!}
							@else
								{!! Form::textArea('observacion', null, ['class' => 'form-control']) !!}
							@endif
							{!! Form::hidden('id_usuario', $colaborador->id_usuario, ['class' => 'form-control']) !!}
						</div>
					</div>
					<div class='form-group'>
					{!! Form::submit("Agregar Evaluacion", ['class' => 'form-control btn btn-success ']) !!}
				</div>
				{!! Form::close() !!}
				<div class='form-group'>
					<div id="btnVolver" class="form-control btn btn-success " > Volver </div>
				</div>
			</div>
			
		</div>
	</div>
</div>
