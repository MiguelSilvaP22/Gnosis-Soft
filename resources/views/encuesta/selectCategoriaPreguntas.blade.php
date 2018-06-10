
{!! Form::label('', 'Categoria Preguntas:') !!}
<div class="input-group">	
	{!! Form::select('id_categoriaPregunta', $categoriasPreguntas,null ,['class' => 'select2','placeholder'=>'Seleccione una Categoria', 'id'=>'id_categoriaPregunta', 'style'=>'width:100%']) !!}
	<span type="button" class="input-group-addon" aria-label="Left Align" onclick="addCategoriaPreguntas()" id="btnaddCategoriaPreguntas"> <i class="fa fa-plus"></i> </span>
</div>
