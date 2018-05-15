
<body> 
  <div class="row">
		<div class="col-xs-12">
			
			<div class="box">
			
				<div class="box-header">
					<h3 class="box-title">Editar area</h3>
				</div>

				<div class="box-body">
				{!! Form::model($area, ['method' => 'PATCH', 'action' => ['AreaController@update',$area->id_area],'id'=>'formArea']) !!}
				<div class='form-group'>
					{!! Form::label('nombre_area', 'Nombre:') !!}
					{!! Form::text('nombre_area', null, ['class' => 'form-control']) !!}
				</div>
				<div class='form-group'>
					{!! Form::submit("Editar Area", ['class' => 'form-control btn btn-success ']) !!}
				</div>
				<div class='form-group'>
					<a href='{{ url()->previous() }}' class="form-control btn btn-success " > Volver </a>
				</div>
  				{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>

</body>

<script>

$('#formArea').submit(function (e) {
	e.preventDefault();  // prevent the form from 'submitting'
	var url = e.target.action  // get the target
	var formData = $(this).serialize() // get form data
	$.post(url, formData, function (response) { // send; response.data will be what is returned
		$('#modal').modal('hide');
		refrescarArea({{$area->id_gerencia}});
		})
})
</script>
