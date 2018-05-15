@extends('admin.layout')

@section ('content')

<body> 
  <div class="row">
		<div class="col-xs-12">
			
			<div class="box">
			
				<div class="box-header">
					<h1 class="box-title">Organigrama {{$empresa->nombre_empresa}}</h1>
				</div>
				<div class="btn-group">
					
					<button  type="button" id="btnGerencia"  value="{{$empresa->id_empresa}}" class="btn btn-success" >
						<i class="fa fa-plus"></i>	Gerencias
					</button>
					<button type="button" id="btnArea" value="{{$empresa->id_empresa}}" class="btn btn-success" >
						<i class="fa fa-plus"></i>	Areas
					</button>
					<button type="button" id="btnPerfil"  value="{{$empresa->id_empresa}}" class="btn  btn-success" >
						<i class="fa fa-plus"></i>	Perfiles
					</button>
				</div>
				<div id='selectGerencias'>

				</div>
				<div class="box-body">
					
				</div>
			</div>
			<div class="box">
			
				<div class="box-header">
					<h1 class="box-title">Gerencias {{$empresa->nombre_empresa}}</h1>
				</div>
				<div class="box-body" id="datosTabla">
					
				</div>
			</div>
		</div>
	</div>

</body>
<div class="modal fade" id="modal">
	<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-body">	
			<div class="row">
				<div class="col-xs-12">
					<div class="box box-primary">
						<div id="formModal" class="box-body">

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

function refrescarGerencia($id)
{
	$.ajax({
		url: "/gerencia/"+$id,
		type: "GET",
		success: function (datos) {
			$("#datosTabla").html(datos);

			$('#tablaGerencia').DataTable({
			
		});
		}

		});
}

$(document).on('click', '#btnGerencia', function () {
	
	$("#selectGerencias").html('');	
	refrescarGerencia(this.value);
});	

$(document).on('click', '#addGerencia', function () {
		
		$.ajax({
		url: "/crearGerencia/"+this.value,
		type: "GET",
		success: function (datos) {
			$("#formModal").html(datos);
			$('#modal').modal('show');
		}

		});
		//alert("asda");
});	

$(document).on('click', '#editGerencia', function () {
		
		$.ajax({
		url: "/editarGerencia/"+this.value,
		type: "GET",
		success: function (datos) {
			$("#formModal").html(datos);
			$('#modal').modal('show');
		}

		});
		//alert("asda");
});	

$(document).on('click', '#deleteGerencia', function () {
		
		$.ajax({
		url: "/desactivarGerencia/"+this.value,
		type: "GET",
		success: function (datos) {
			$("#formModal").html(datos);
			$('#modal').modal('show');
		}

		});
		//alert("asda");
});	
function refrescarArea($id)
{
	$.ajax({
		url: "/area/"+$id,
		type: "GET",
		success: function (datos) {
			$("#datosTabla").html(datos);

			$('#tablaArea').DataTable({
			
		});
		}

		});
}
$(document).on('click', '#btnArea', function () {
		
		$("#datosTabla").html('');
		$.ajax({
		url: "/selectGerencia/"+this.value,
		type: "GET",
		success: function (datos) {
			$("#selectGerencias").html(datos);
			$('#select_gerencia').select2();			
		}

		});
	});	
	$(document).on('change', '#select_gerencia', function () {
		
		refrescarArea(this.value);
	});	     

	
$(document).on('click', '#addArea', function () {
		
		$.ajax({
		url: "/crearArea/"+this.value,
		type: "GET",
		success: function (datos) {
			$("#formModal").html(datos);
			$('#modal').modal('show');
		}

		});
		//alert("asda");
});	  

$(document).on('click', '#editArea', function () {
		
		$.ajax({
		url: "/editarArea/"+this.value,
		type: "GET",
		success: function (datos) {
			$("#formModal").html(datos);
			$('#modal').modal('show');
		}

		});
		//alert("asda");
});	

$(document).on('click', '#deleteArea', function () {
		
		$.ajax({
		url: "/desactivarArea/"+this.value,
		type: "GET",
		success: function (datos) {
			$("#formModal").html(datos);
			$('#modal').modal('show');
		}

		});
		//alert("asda");
});	
</script>

@stop
