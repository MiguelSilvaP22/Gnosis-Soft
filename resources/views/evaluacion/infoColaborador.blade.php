<div class="row">
	<div class="col-xs-12">
	{!! Form::open(['action' => 'EvaluacionController@store','id'=>'formEvaluacion']) !!}
		<div class="box">
			<div class="box-header">
				<h1 class="box-title">Datos Colaborador</h1>
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
