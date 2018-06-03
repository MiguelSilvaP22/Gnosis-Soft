
<body> 
	<div class="row">
		  <div class="col-xs-12">
			  
			  <div class="box">
			  
				  <div class="box-header">
					  <h3 class="box-title">Detalle de Competencia</h3>
				  </div>
  
				  <div class="box-body">
				  {!! Form::model($competencia, ['method' => 'PATCH', 'action' => ['CompetenciaController@update',$competencia->id_comp],'id'=>'formCompetencia']) !!}
				  <div class='form-group'>
					  {!! Form::label('nombre_comp', 'Nombre:') !!}
					  {!! Form::text('nombre_comp', null, ['class' => 'form-control', 'readonly' => true]) !!}
				  </div>
  
				  <div class='form-group'>
					  {!! Form::label('desc_comp', 'Descripción:') !!}
					  {!! Form::text('desc_comp', null, ['class' => 'form-control', 'readonly' => true]) !!}
				  </div>
  
				  <div class='form-group'>
					  {!! Form::label('nombre_categoriacomp', 'Categoria:') !!}
					  {!! Form::select('id_categoriacomp', $categoriascompetencias,null ,['class' => 'form-control', 'readonly' => true, 'data-placeholder'=>'Seleccione uno o varios giros','id'=>'id_categoriacomp', 'style'=>'width:100%']) !!}
				  </div>	

	 			 <div class='form-group'>
					  {!! Form::label('nombre_categoriacomp', 'Roles de Desempeño:') !!}
	
				  </div>
				  @foreach ($roldesempenos as $roldesempeno)
				 
				  {!! Form::text('rolDesempeno', $roldesempeno->nombre_roldesempeno, ['class' => 'form-control', 'readonly' => true]) !!}

				  @endforeach


				<div class='form-group'>
					{!! Form::label('nombre_categoriacomp', 'SUPERLATIVO:') !!}
					{!! Form::text('niveles[]', $niveles[0], ['class' => 'form-control']) !!}
				</div>	
				<div class='form-group'>
					{!! Form::label('nombre_categoriacomp', 'EFICIENTE:') !!}
					{!! Form::text('niveles[]', $niveles[1], ['class' => 'form-control']) !!}
				</div>	
				<div class='form-group'>
					{!! Form::label('nombre_categoriacomp', 'PROMEDIO SUFICIENTE:') !!}
					{!! Form::text('niveles[]', $niveles[2], ['class' => 'form-control']) !!}
				</div>	
				<div class='form-group'>
					{!! Form::label('nombre_categoriacomp', 'POR DEBAJO DE LO ESPERADO:') !!}
					{!! Form::text('niveles[]', $niveles[3], ['class' => 'form-control']) !!}
				</div>	
				<div class='form-group'>
					{!! Form::label('nombre_categoriacomp', 'INSUFICIENTE:') !!}
					{!! Form::text('niveles[]', $niveles[4], ['class' => 'form-control']) !!}
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
  
  
  
