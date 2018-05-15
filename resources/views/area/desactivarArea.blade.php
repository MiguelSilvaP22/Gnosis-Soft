
<body> 
  <div class="row">
		<div class="col-xs-12">
			
			<div class="box">
			
				<div class="box-header">
					<h3 class="box-title">¿ Desea Desactivar la area: {{$area->nombre_area}} ?</h3>
				</div>

				<div class="box-body">
				<table class='table'>
					<tbody>
						<tr>
							<td><button id="confirmDelete" value="{{ $area->id_area}}" class="btn btn btn-info"><i class="fa fa-eye"></i> Si </button></td>
							<td><button class="btn btn btn-info"><i class="fa fa-eye"></i> No </button></td>
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
		url: "/eliminarArea/"+this.value,
		type: "GET",
		success: function (datos) {
			$('#modal').modal('hide');
			refrescarArea({{$area->id_gerencia}});
		}

		});
		//alert("asda");
});	
</script>
