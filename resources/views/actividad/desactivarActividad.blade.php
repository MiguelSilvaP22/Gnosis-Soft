
<body> 

	<div class="box-header">
		<h3 class="box-title">¿ Desea Desactivar la Actividad: {{$actividad->nombre_actividad}} ?</h3>
	</div>

	<div class="box-body">
	<table class='table'>
		<tbody>
			<tr>
				<td><button id="confirmDelete" value="{{ $actividad->id_actividad}}" class="btn btn btn-info"><i class="fa fa-eye"></i> Si </button></td>
				<td><button id="exit" class="btn btn btn-info"><i class="fa fa-eye"></i> No </button></td>
			</tr>
		</tbody>
	</table>


</body>

<script>
$(document).on('click', '#confirmDelete', function () {
		
		$.ajax({
		url: "/eliminarActividad/"+this.value,
		type: "GET",
		success: function (datos) {
			$('#modal').modal('hide');
			$(location).attr('href',"actividad");

		}

		});
});
$(document).on('click', '#exit', function () {
		$('#modal').modal('hide');
		
});
</script>
