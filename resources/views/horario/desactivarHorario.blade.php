
<body> 


	<div class="box-header">
		<h3 class="box-title">¿ Desea Desactivar El Horario del día : {{date('d/m/Y',strtotime($horarioActividad->fecha_horario))}} ?</h3>
	</div>

	<div class="box-body">
		<table class='table'>
			<tbody>
				<tr>
					<td><button id="confirmDelete" value="{{ $horarioActividad->id_horario}}" class="btn btn btn-info"><i class="fa fa-eye"></i> Si </button></td>
					<td><button id="exit" class="btn btn btn-info"><i class="fa fa-eye"></i> No </button></td>
				</tr>
			</tbody>
		</table>
	</div>


</body>

<script>
$(document).on('click', '#confirmDelete', function () {
		
		$.ajax({
		url: "/eliminarHorario/"+this.value,
		type: "GET",
		success: function (datos) {
			$('#modal').modal('hide');
			$(location).attr('href',"actividad");

		}

		});
		//alert("asda");
});
$(document).on('click', '#exit', function () {
		$('#modalBorrar').modal('hide'	);

		//alert("asda");
});
</script>
