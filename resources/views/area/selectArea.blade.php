<label for="users">Seleccionar Area</label>
	<select id="select_area" class="form-control">
	<option disabled selected value> Seleccione un Area</option>
	@foreach($areas as $area)
		<option value="{{ $area->id_area }}"> {{ $area->nombre_area }}</option>
	@endforeach
</select>
<label id="errAreaUsuario">