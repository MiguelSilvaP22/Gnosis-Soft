<div class="col-xs-12" id="columnaPregunta{{$id}}">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Preguntas por Categoría</h3>
			<span id="btnEliminarColumnaPregunta" onClick="eliminarColumnaPregunta({{$id}});" class="btn btn-default btn-flat" style="float: right;">
				<i class="fa fa-remove"></i>
			</span>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-12">
					<div id='categoriaPreguntas{{$id}}' class='form-group' >								
						{!! Form::label('', 'Categoría Preguntas:') !!}
						<div class="input-group">	
							{!! Form::select('id_categoriaPregunta['.$id.']', $categoriasPreguntas,null ,['class' => 'select2','placeholder'=>'Seleccione una Categoría', 'id'=>'id_categoriaPregunta'.$id.'', 'style'=>'width:100%']) !!}
							<span type="button" class="input-group-addon" aria-label="Left Align" onclick="addCategoriaPreguntas({{$id}})" id="btnaddCategoriaPreguntas{{$id}}"> <i class="fa fa-plus"></i> </span>
						</div>
					</div>
					<div id='nuevoCategoriaPreguntas{{$id}}' class='form-group' >
					</div>
						<div> 
							<table id="tableAddPreguntas{{$id}}" style="width:100%;">
								<tbody>
								<tr id="form{{$id}}">
									<td>
									<div  class='form-group' >
										{!! Form::label('', ' Pregunta 1') !!}
											<div class="input-group">	
											{!! Form::text('nombre_pregunta[{{$id}}]', null, ['class' => 'form-control date','id'=>'nombre_pregunta{{$id}}']) !!}
											<span type="button" class="input-group-addon" onClick="cargarFormPreguntas({{$id}});"aria-label="Left Align"> <i class="fa fa-remove"></i> </span>
											</div>
										</div>
										<div class='form-group'>
											{!! Form::radio('alternativa['.$id.']', '1'); !!} Satisfacción
											{!! Form::radio('alternativa['.$id.']', '2'); !!} Escala de Notas	
											{!! Form::radio('alternativa['.$id.']', '3'); !!} Si / No	
											{!! Form::radio('alternativa['.$id.']', '4'); !!} Opinión
										</div>
									</td>
								</tr>	
								</tbody>
							</table>	
						</div>	
				</div>
			</div>
		</div>	
	</div>
</div>