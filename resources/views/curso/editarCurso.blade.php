
<body> 
  <div class="row">
		<div class="col-xs-12">
			
			<div class="box">
			
				<div class="box-header">
					<h3 class="box-title">Editar Curso </h3>
				</div>

				<div class="box-body">
					<div class="row">
						
					{!! Form::model($curso, [ 'enctype'=>"multipart/form-data",'method' => 'PATCH', 'action' => ['CursoController@update',$curso->id_curso]]) !!}
						<div class="col-md-12">
							<div class='form-group'>
								{!! Form::label('', 'Codigo:') !!}
								{!! Form::text('cod_interno_curso', null, ['class' => 'form-control']) !!}
							</div>
							<div class='form-group'>
								{!! Form::label('', 'Codigo Sence:') !!}
								{!! Form::text('cod_sence_curso', null, ['class' => 'form-control']) !!}
							</div>
							<div class='form-group'>
								{!! Form::label('', 'Nombre:') !!}
								{!! Form::text('nombre_curso', null, ['class' => 'form-control']) !!}
							</div>
							<div class='form-group'>
								{!! Form::label('', 'Objetivo:') !!}
								{!! Form::text('objetivo_curso', null, ['class' => 'form-control']) !!}
							</div>
							<div class='form-group'>
								{!! Form::label('', 'Descripción:') !!}
								{!! Form::textArea('desc_curso', null, ['class' => 'form-control']) !!}
							</div>
							<div class='form-group'>
								{!! Form::label('', 'Cantidad de Horas:') !!}
								{!! Form::text('cant_hora_curso', null, ['class' => 'form-control']) !!}
							</div>
							<div class='form-group'>
								{!! Form::label('', 'Modalidad:') !!}
								{!! Form::select('id_modalidad', $modalidades,null ,['class' => 'select2','placeholder'=>'Seleccione una modalidad','id'=>'id_modalidad', 'style'=>'width:100%']) !!}
							</div>
							<div class='form-group'>
								{!! Form::label('', 'Area Curso:') !!}
								{!! Form::select('id_areacurso', $areasCurso,null ,['class' => 'select2','placeholder'=>'Seleccione una area','id'=>'id_areacurso', 'style'=>'width:100%']) !!}
							</div>
							<div class='form-group'>
								{!! Form::label('', 'Competencias:') !!}
								{!! Form::select('id_competencia[]', $competencias,null ,['class' => 'select2','multiple','placeholder'=>'Seleccione una modalidad','id'=>'id_competencia', 'style'=>'width:100%']) !!}
							</div>
							<div class='form-group'>
								{!! Form::label('', 'Contenido General') !!}	
								{!! Form::button('Agregar nuevo contenido', ['class' => 'form-control btn btn-success ', 'id'=> 'addContenido']) !!}	
							</div>	
							@foreach ($contenidosGenerales as $key => $contenidoGeneral)
				 
								{!! Form::text('contenidoGeneral[]', $contenidoGeneral->nombre_contenidog, ['class' => 'form-control' , 'id'=>'contenidoGeneral'.$key.'']) !!}
								<button type="button" class="btn btn-default" aria-label="Left Align" onclick="eliminarContenido({{$key}})" id="btnEliminarContenido{{$key}}">   <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> </button>
		  
							@endforeach
							<div class='form-group'>
								{!! Form::label('', 'Temario: ') !!} <a href="{{asset('temario/'.$curso->link_temario_curso)}}" target="_blank">{{$curso->link_temario_curso}}</a>
								{!! Form::file('temario_curso', null, ['class' => 'form-control']) !!}
								
							</div>	
						<div class='form-group'>
							{!! Form::submit("Editar Curso", ['class' => 'form-control btn btn-success ']) !!}
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

$(document).ready(function() {

	alert("ok");

	
    $('.select2').select2();
	var idCompetencias = {{$competenciasCurso}};
	$('#id_competencia').select2().val(idCompetencias).trigger("change");
});
var count ={{Count($contenidosGenerales)}}-1;
$('#addContenido').click(function() {
	count++;

	$('#addContenido').parent().append('<input class="form-control" name="contenidoGeneral[]" id="contenidoGeneral'+count+'" type="text" ">');
	$('#addContenido').parent().append('<button type="button" class="btn btn-default" aria-label="Left Align" onclick="eliminarContenido('+count+')" id="btnEliminarContenido'+count+'">   <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> </button>');
});
function eliminarContenido(id){
	$("#contenidoGeneral"+id).remove();
	$("#btnEliminarContenido"+id).remove();
}


</script>
