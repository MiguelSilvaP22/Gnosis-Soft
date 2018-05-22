<label for="users">Seleccionar Gerencia</label>
	<select id="select_gerencia" class="form-control" >
	<option disabled selected value> Seleccione una Gerencia</option>
	@foreach($gerencias as $gerencia)
		<option value="{{ $gerencia->id_gerencia }}"> {{ $gerencia->nombre_gerencia }}</option>
	@endforeach
</select>
<input type="hidden" id="llamadoGerencia" />