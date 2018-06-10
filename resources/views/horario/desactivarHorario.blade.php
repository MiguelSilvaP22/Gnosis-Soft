
<body> 
	<div class="col-xs-12">
		
		<div class="box">
		
			<div class="box-header">
				<h3 class="box-title">Evaluar Colaborador</h3>
			</div>

			<div class="box-body">
				<div class="row">
					<div class="col-md-12">
						<table id="tableColab" class="table">
							<thead>
								<tr>
									<th>
										Nombre
									</th>
									<th>
										Run
									</th>
									<th>
										Asistencia
									</th>
									<th>
										
									</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
									</td>
								</tr>
							</tbody>
						</table>						
						
					</div>
					<div class='form-group'>
							<div id="btnVolver" class="form-control btn btn-success " > Volver </div>
						</div>
  				</div>
			</div>
		</div>
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
