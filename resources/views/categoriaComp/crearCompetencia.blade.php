
<body> 
  <div class="row">
		<div class="col-xs-12">
			
			<div class="box">
			
				<div class="box-header">
					<h3 class="box-title">Crear Competencia</h3>
				</div>

				<div class="box-body">
					{!! Form::open(['action' => 'CompetenciaController@store','id'=>'formCompetencia']) !!}
				

				<div class='form-group'>
					{!! Form::label('nombre_comp', 'Nombre:') !!}
					{!! Form::text('nombre_comp', null, ['class' => 'form-control']) !!}
				</div>
				<div class='form-group'>
					{!! Form::label('desc_comp', 'Descripción:') !!}
					{!! Form::text('desc_comp', null, ['class' => 'form-control']) !!}
				</div>

				<div class='form-group'>
					{!! Form::label('nombre_categoriacomp', 'Categoria:') !!}
					{!! Form::select('id_categoriacomp', $categoriascompetencias,null ,['class' => 'form-control','data-placeholder'=>'Seleccione uno o varios giros','id'=>'id_categoriacomp', 'style'=>'width:100%']) !!}
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

