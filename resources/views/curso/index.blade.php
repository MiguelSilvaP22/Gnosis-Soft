@extends('admin.layout')

@section ('content')

<body> 
  <div class="row">
		<div class="col-xs-12">
			
			<div class="box">
			
				<div class="box-header">
					<h1 class="box-title">Tabla de Cursos</h1>
				</div>
				<div style="widtn:100%;align:center;">
					
					<div id="btnAgregar" class="btn btn-block btn-success" style="float: right;margin-bottom: 10px;margin-right: 10px;width:200px;">
						<i class="fa fa-plus"></i>	Agregar
					</div>
				</div>
				<div class="box-body">
				@if (count($cursos)>0)
				<table id="tablaCurso" class="table">
					<thead>
						<tr>
							<th>Codigo</th>
							<th>Nombre Curso</th>
							<th>Cantidad de Horas</th>						
							<th>Fecha de Modificación</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($cursos as $curso) 
						<tr>

							<td >
								<p>Codigo: {{ $curso->cod_interno_curso}}</p>
								<p>Sence : {{ $curso->cod_sence_curso}}</p>
							</td>
							<td >{{ $curso->nombre_curso}}</td>
							<td >{{ $curso->cant_hora_curso}}</td>
							<td >{{ $curso->fecha_mod_curso}}</td>
							<td>
								<a id="btnActividades" href="{{route('actividad.index')}}/{{$curso->id_curso}}" class="btn btn btn-info"><i class="fa fa-eye"></i> Actividades</a>
								<button id="btnVer" value="{{ $curso->id_curso}}" class="btn btn btn-info"><i class="fa fa-eye"></i> Ver</button>
								<button id="btnEditar" value="{{ $curso->id_curso}}" class="btn btn btn-info"><i class="fa fa-edit"></i> Editar</button>
								<button id="deleteCurso" class="btn btn btn-info" value="{{ $curso->id_curso}}"><i class="fa fa-eraser"></i> Eliminar</button>
							</td>
						</tr>
						@endforeach
						
							
					</tbody>
				</table>
				@else
				<h1>No Hay cursos registrados</h1>
				@endif
				</div>
			</div>
		</div>
	</div>

</body>
<div class="modal fade bs-example-modal-lg" id="modal">
	<div class="modal-dialog modal-lg">
	<div class="modal-content">
		<div class="modal-body">	
			<div class="row">
				<div class="col-xs-12">
					<div class="box box-primary">
						<div id="datos" class="box-body">

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@stop

@section('script-js')
<script>
$(document).ready(function() {
	$('#tablaCurso').DataTable({
			
		});
} );

$(document).on('click', '#btnVer', function () {
		$.ajax({
		url: "/verCurso/"+this.value,
		type: "GET",
		success: function (datos) {
			$("#datos").html(datos);
			$('#modal').modal({
                        backdrop: 'static',
                        keyboard: true, 
                        show: true
                });
		}

		});
		//alert("asda");
});	

$(document).on('click', '#btnAgregar', function () {
		$.ajax({
		url: "/crearCurso/",
		type: "GET",
		success: function (datos) {
			$("#datos").html(datos);
			$('#modal').modal({
                        backdrop: 'static',
                        keyboard: true, 
                        show: true
                });
		}

		});
		//alert("asda");
});	


$(document).on('click', '#btnEditar', function () {
		$.ajax({
		url: "/editarCurso/"+this.value,
		type: "GET",
		success: function (datos) {
			
			$("#datos").html(datos);
			$('#modal').modal({
                        backdrop: 'static',
                        keyboard: true, 
                        show: true
                });
			
		}

		});
		//alert("asda");
});	


$(document).on('click', '#deleteCurso', function () {
		
		$.ajax({
		url: "/desactivarCurso/"+this.value,
		type: "GET",
		success: function (datos) {
			$("#datos").html(datos);
			$('#modal').modal({
                        backdrop: 'static',
                        keyboard: true, 
                        show: true
                }); 
		}

		});
		//alert("asda");
});



</script>

@stop
