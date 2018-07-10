
@extends('admin.layout')
@section ('content')
<h1>Estado de Curso</h1>
<ol class="breadcrumb">
	<li><a href="/vistaEmpresa"><i class="fa fa-dashboard"></i>Dashboard</a></li>
	<li>Curso</li>
	<li class="active">Estado de Curso</li>
</ol>
<body> 
	<div class="row">
		<div class="col-xs-12">
			<div class="box">			
				<div class="box-header">
				</div>
				<div class="box-body">
					<div class="col-xs-12">
						<div class='form-group'>
							{!! Form::label('', 'Empresa:') !!}
							{!! Form::select('id_empresa', $empresas,null ,['class' => 'select2','placeholder'=>'Seleccione una empresa','id'=>'empresa', 'style'=>'width:100%']) !!}
						</div>	
						<div class='form-group' id="selectCurso">
							{!! Form::label('', 'Cursos:') !!}
							{!! Form::select('id_curso', array('' => 'Seleccione un curso'),null ,['class' => 'select2','disabled','id'=>'curso', 'style'=>'width:100%']) !!}
						</div>
						<div class='form-group' id="selectActividad">
							{!! Form::label('', 'Actividades:') !!}
							{!! Form::select('id_actividad', array('' => 'Seleccione una Actividad'),null ,['class' => 'select2','disabled','id'=>'actividad', 'style'=>'width:100%']) !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="infoCurso"></div>
</body>

@stop

@section('script-js')
<script>
$(document).ready(function() {
	$(".select2").select2();
});
$(document).on('change', '#empresa', function () {
	$.ajax({
		url: "/cursosEmpresa/"+this.value,
		type: "GET",
		success: function (datos) {
			$("#selectCurso").html(datos);
			$(".select2").select2();
		}
		});
});
$(document).on('change', '#curso', function () {
	$.ajax({
		url: "/actividadesCursoEmpresa/"+$('#empresa').val()+"-"+this.value,
		type: "GET",
		success: function (datos) {
			$("#selectActividad").html(datos);
			$(".select2").select2();
		}
		});
});

$(document).on('change', '#actividad', function () {
	$.ajax({
		url: "/informacionCurso/"+$('#empresa').val()+"-"+this.value,
		type: "GET",
		success: function (datos) {
			$("#infoCurso").html(datos);
			
		}
		});
});
</script>


@stop