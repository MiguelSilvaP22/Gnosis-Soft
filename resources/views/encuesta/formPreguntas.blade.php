<tr id="form{{$idForm}}">
	<td>
	<div class='form-group' >
		{!! Form::label('', 'Pregunta '.($idForm+1)) !!}
			<div class="input-group">	
			{!! Form::text('nombre_pregunta[]', null, ['class' => 'form-control date','id'=>'nombre_pregunta']) !!}
			<span type="button" class="input-group-addon" aria-label="Left Align"> <i class="fa fa-remove"></i> </span>
			</div>
		</div>
		<div class='form-group'>
			{!! Form::radio('alternativa['.$idForm.']', '1'); !!} Satisfacción
			{!! Form::radio('alternativa['.$idForm.']', '2'); !!} Escala de Notas	
			{!! Form::radio('alternativa['.$idForm.']', '3'); !!} Si / No	
			{!! Form::radio('alternativa['.$idForm.']', '4'); !!} Opinion
		</div>
	</td>
</tr>	