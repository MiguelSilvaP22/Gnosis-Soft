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
				<div id='selectAreas'>

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

function refrescarGerencia(id)
{
	$.ajax({
		url: "/gerencia/"+id,
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
	$("#selectAreas").html('');	
	refrescarGerencia(this.value);
});	

$(document).on('click', '#addGerencia', function () {
		
		$.ajax({
		url: "/crearGerencia/"+this.value,
		type: "GET",
		success: function (datos) {
			$("#formModal").html(datos);
			$('#modal').modal({
                        backdrop: 'static',
                        keyboard: true, 
                        show: true
                }); 
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
function refrescarArea(id)
{
	$.ajax({
		url: "/area/"+id,
		type: "GET",
		success: function (datos) {
			$("#datosTabla").html(datos);

			$('#tablaArea').DataTable({
			
		});
		}

		});
}
function selectGerenciaArea(id,area)
{
	$("#datosTabla").html('');
		$.ajax({
		url: "/selectGerencia/"+id,
		type: "GET",
		success: function (datos) {
			$("#selectGerencias").html(datos);
			$('#select_gerencia').select2();	

			if(area == 1)
			{
				$("#llamadoGerencia").val('1');
				
			}else
			{
				$("#llamadoGerencia").val('0');
			}		
		}

		});
}
$(document).on('click', '#btnArea', function () {
	
	$("#selectAreas").html('');	
	selectGerenciaArea(this.value,0);
	
});

$(document).on('change', '#select_gerencia', function () {
	if($("#llamadoGerencia").val() == 0)
	{
		refrescarArea(this.value);
	}else
	{
		
		$.ajax({
		url: "/selectArea/"+this.value,
		type: "GET",
		success: function (datos) {
			$("#selectAreas").html(datos);
			$('#select_area').select2();			
		}

		});
	}
	
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

// Perfil-----------------------------------------------
function refrescarPerfil(id)
{
	$.ajax({
		url: "/perfilOcupacional/"+id,
		type: "GET",
		success: function (datos) {
			$("#datosTabla").html(datos);

			$('#tablaPerfil').DataTable({
			
		});
		}

		});
}



$(document).on('click', '#btnPerfil', function () {
		
		selectGerenciaArea(this.value,1);
		$("#datosTabla").html('');
		

		
	});
$(document).on('change', '#select_area', function () {
	
	refrescarPerfil(this.value);
});	     

	
$(document).on('click', '#addPerfil', function () {
		
		$.ajax({
		url: "/crearPerfilOcupacional/"+this.value,
		type: "GET",
		success: function (datos) {
			$("#formModal").html(datos);
			$('#modal').modal('show');
			$('#id_comp').select2();	
		}

		});
		//alert("asda");
});	  

$(document).on('click', '#editPerfil', function () {
		
		$.ajax({
		url: "/editarPerfilOcupacional/"+this.value,
		type: "GET",
		success: function (datos) {
			$("#formModal").html(datos);
			$('#modal').modal('show');
		}

		});
		//alert("asda");
});	

$(document).on('click', '#deletePerfil', function () {
		
		$.ajax({
		url: "/desactivarPerfilOcupacional/"+this.value,
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
