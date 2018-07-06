
<div class="col-xs-12">			
	<div class="box">
		<div class="box-header">
			<h1 class="box-title">Evaluacion de {{$evaluacionColaborador->encuesta->nombre_encuesta}}</h1>
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
								
									{!! Form::radio("respuestas[".$preguntaEncuesta->pregunta->id_pregunta."]", $alternativaPregunta->alternativa->id_alternativa, null) !!} 

								@endforeach
								<div class='form-group'>
									{!! Form::label('', 'Comentario:') !!}
									{!! Form::textArea('comentario_altvev['.$preguntaEncuesta->pregunta->id_pregunta.']', null, ['class' => 'form-control','rows'=>'4','cols'=>'50','id'=>'comentario_altvev','maxlength'=>'1000']) !!}
								</div>	
							</div>
						</div>
					</div>		
				</div>
				@endforeach
			</div>
			<div class='form-group'>
				{!! Form::hidden('id_evencuesta',$evaluacionColaborador->id_evencuesta, ['class' => 'form-control']) !!}
				{!! Form::submit("Responder", ['class' => 'form-control btn btn-success ']) !!}
			</div>
		{!! Form::close() !!}	
		</div>
	</div>
</div>	







