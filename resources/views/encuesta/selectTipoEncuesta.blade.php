
{!! Form::label('', 'Tipo de Encuesta:') !!}
<div class="input-group">	
	{!! Form::select('id_tipoEncuesta', $tiposEncuesta,null ,['class' => 'select2','placeholder'=>'Seleccione un Tipo', 'id'=>'id_tipoEmpresa', 'style'=>'width:100%']) !!}
	<span type="button" class="input-group-addon" aria-label="Left Align" onclick="addTipoEncuesta()" id="btnAddTipoEncuesta"> <i class="fa fa-plus"></i> </span>
</div>
