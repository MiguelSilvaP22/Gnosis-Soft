
<body> 
  <div class="row">
		<div class="col-xs-12">
			
			<div class="box">
			
				<div class="box-header">
					<h3 class="box-title">¿ Desea Desactivar la gerencia: {{$gerencia->nombre_gerencia}} ?</h3>
				</div>

				<div class="box-body">
				<table class='table'>
					<tbody>
						<tr>
							<td><button id="confirmDelete" value="{{ $gerencia->id_gerencia}}" class="btn btn btn-info"><i class="fa fa-eye"></i> Si </button></td>
							<td><button id="exit" class="btn btn btn-info"><i class="fa fa-eye"></i> No </button></td>
						</tr>
					</tbody>
				</table>
				</div>
			</div>
		</div>
	</div>

</body>

<script>
$(document).on('click', '#confirmDelete', function () {
		
		$.ajax({
		url: "/eliminarGerencia/"+this.value,
		type: "GET",
		success: function (datos) {
			$('#modal').modal('hide');
			refrescarGerencia({{$gerencia->id_empresa}});
		}

		});
		//alert("asda");
});
$(document).on('click', '#exit', function () {
		$('#modal').modal('hide');
		refrescarGerencia({{$gerencia->id_empresa}});
		//alert("asda");
});
</script>
