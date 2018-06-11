<tr id="form{{$idForm}}">
	<td>
	<div class='form-group' >
		{!! Form::label('', 'Pregunta '.($idForm+1)) !!}
			<div class="input-group">	
			{!! Form::text('nombre_pregunta['.$idForm.']', null, ['class' => 'form-control','id'=>'nombre_pregunta'.$idForm.'']) !!}
			<span type="button" class="input-group-addon" onClick="eliminarFormPreguntas({{$idForm}});" aria-label="Left Align"> <i class="fa fa-remove"></i> </span>
			</div>
		</div>
		{{--<div class='form-group'>
			@foreach($tiposAlternativa as $tipoAltv)
				{!! Form::radio("alternativa[".$idForm."]", $tipoAltv->id_tipoaltv, null) !!} {{$tipoAltv->nombre_tipoaltv}}								
			@endforeach
		</div>--}}
	</td>
</tr>	