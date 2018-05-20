<label for="users">Seleccionar Area</label>
	<select id="select_area" class="form-control">
	@foreach($areas as $area)
		<option value="{{ $area->id_area }}"> {{ $area->nombre_area }}</option>
	@endforeach
</select>