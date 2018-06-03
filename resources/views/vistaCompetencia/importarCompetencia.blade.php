
<body> 
  <div class="row">
		<div class="col-xs-12">
			
			<div class="box">
			
				<div class="box-header">
					<h3 class="box-title">Crear Competencia</h3>
				</div>

				<div class="box-body">
				{!! Form::open(['action' => 'CompetenciaController@store','id'=>'formCompetencia']) !!}
				
				{!! Form::hidden('tipo', '1', ['class' => 'form-control']) !!}

				<div class='form-group'>
					{!! Form::label('Archivo', 'Nombre:') !!}
					{!! Form::File('Archivo', null, ['class' => 'form-control']) !!}
				</div>

			
				<div class='form-group'>
					{!! Form::submit("Agregar Competencia", ['class' => 'form-control btn btn-success ']) !!}
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


