
<div class="col-xs-12">			
	<div class="box">
		<div class="box-header">
			<h1 class="box-title">Evaluación de {{$evaluacionColaborador->encuesta->nombre_encuesta}}</h1>
		</div>
		<div class="box-body">
		{!! Form::open(['action' => 'EvaluarEncuestaController@store','id'=>'formEvaEncuesta']) !!}
			<div class="row">
				@foreach($evaluacionColaborador->encuesta->preguntasEncuesta as $key => $preguntaEncuesta)
				<div class="col-md-12">
					<div class='form-group'>
						{!! Form::label('',($key+1).") ".$preguntaEncuesta->pregunta->nombre_pregunta) !!}
						<div class="row">
							<div class="col-md-12">
								@foreach($preguntaEncuesta->pregunta->alternativasPregunta as $alternativaPregunta)

								{!! $alternativaPregunta->alternativa->nombre_alternativa !!}	 
								
									{!! Form::radio("evaluacion[".$preguntaEncuesta->pregunta->id_pregunta."]", $alternativaPregunta->alternativa->id_alternativa, null) !!} 

								@endforeach	
							</div>
						</div>
					</div>		
				</div>
				@endforeach
			</div>
			<div class='form-group'>
				{!! Form::submit("Responder", ['class' => 'form-control btn btn-success ']) !!}
			</div>
		{!! Form::close() !!}	
		</div>
	</div>
</div>	







