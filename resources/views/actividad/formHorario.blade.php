<tr id="form{{$idForm}}">
	<td>
		{!! Form::text('fecha_horario[]', null, ['class' => 'form-control date','id'=>'fechaIniHora']) !!}
		{!! Form::label('', '',['id' => 'errfechaIniHora']) !!}
	</td>
	<td>
		{!! Form::text('hora_inicio_horario[]', null, ['class' => 'form-control timepicker','id'=>'horaIniHora']) !!}
		{!! Form::label('', '',['id' => 'errhoraIniHora']) !!}
	</td>
	<td>
		{!! Form::text('hora_termino_horario[]', null, ['class' => 'form-control timepicker','id'=>'horaTermHora']) !!}
		{!! Form::label('', '',['id' => 'errhoraTermHora']) !!}
	</td>
	<td>
		<button type="button" class="btn btn-default" aria-label="Left Align" onclick="eliminarForm({{$idForm}})" id="btnEliminarForm{{$idForm}}">  
		 	<span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> 
		</button>
	</td>
</tr>	